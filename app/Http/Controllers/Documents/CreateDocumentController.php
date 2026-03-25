<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Type;
use App\Models\PriorityLevel;
use App\Models\Unit;
use App\Models\User;
use App\Models\Action;
use App\Models\UserAssignment;
use App\Models\Document;
use App\Models\Transaction;

use App\Http\Requests\Documents\StoreDocumentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CreateDocumentController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $priorityLevels = PriorityLevel::all();
        $units = Unit::all();
        $actions = Action::all();

        $users = User::whereNull('deleted_at')
            ->where('id', '!=', Auth::id())
            ->with('activeAssignments.unit')
            ->get();

        $myUnits = UserAssignment::where('user_id', Auth::id())
            ->where('is_current', 1)
            ->with('unit')
            ->get()
            ->map(fn ($a) => [
                'assignment_id' => $a->id,
                'unit_id' => $a->unit->id,
                'unit_name' => $a->unit->unit_name,
                'position' => $a->position,
            ]);

        return view('documents.createDocument.create-document', compact(
            'types',
            'priorityLevels',
            'units',
            'actions',
            'users',
            'myUnits'
        ));
    }

    public function store(StoreDocumentRequest $request)
{
    Log::info('Starting document store...');
    Log::info($request->all());
    try {
        DB::transaction(function () use ($request) {

            // Determine if confidential
            $isConfidential = $request->boolean('is_confidential');

            // 1. Create the document
            $document = Document::create([
                'reference_number' => $this->generateReferenceNumber(),
                'owner_id'         => $request->assignment_id, // sender's assignment
                'document_type_id' => $request->type_id,
                'priority_lvl_id'  => $request->priority_level_id,
                'document_name'    => $request->document_name,
                'category'         => $request->category,
                'description'      => $request->description,
                'source_type'      => $request->source_type,
                'deadline'         => $request->deadline,
                'status_id'        => 1,
                'is_confidential' => $isConfidential,
            ]);

            // 2. Handle file upload
            $fileDirectory = null;
            if ($request->hasFile('file_upload')) {
                $fileDirectory = $request->file('file_upload')->store('documents', 'public');
            }

            // 3. Resolve tagged assignment IDs
            $taggedAssignmentIds = $this->resolveTaggedAssignments($request);

if ($taggedAssignmentIds->count() > 1) {
    // Only create a parent if multiple receivers
    $parentTransaction = Transaction::create([
        'document_id' => $document->id,
        'sender_id'   => $request->assignment_id,
        'receiver_id' => null,
        'status_id'   => 1,
        'action_id'   => $request->action_id,
        'remarks'     => $request->remarks,
    ]);

    foreach ($taggedAssignmentIds as $receiverId) {
        Transaction::create([
            'document_id' => $document->id,
            'sender_id'   => $request->assignment_id,
            'receiver_id' => $receiverId,
            'parent_id'   => $parentTransaction->id,
            'status_id'   => 1,
            'action_id'   => $request->action_id,
            'remarks'     => $request->remarks,
        ]);
    }
} else {
    // Only one receiver → create single transaction directly
    Transaction::create([
        'document_id' => $document->id,
        'sender_id'   => $request->assignment_id,
        'receiver_id' => $taggedAssignmentIds->first(),
        'status_id'   => 1,
        'action_id'   => $request->action_id,
        'remarks'     => $request->remarks,
    ]);
}
        });

        return redirect()->back()->with('success', 'Document created successfully.');

    } catch (\Illuminate\Database\QueryException $e) {
        Log::error('DB Error: ' . $e->getMessage());

        return redirect()->back()
            ->withInput()
            ->with('error', 'A database error occurred. Please try again.');
    } catch (\Exception $e) {
        Log::error('General Error: ' . $e->getMessage());

        return redirect()->back()
            ->withInput()
            ->with('error', 'Something went wrong. Please try again.');
    }
}

    /**
     * Resolve which UserAssignment IDs to tag based on tagged_users and tagged_units.
     * - Unit ID "1" (all units)  → tag every active UserAssignment
     * - Normal unit ID           → tag all active UserAssignments in that unit
     * - Individual user IDs      → tag those specific UserAssignments
     */
    private function resolveTaggedAssignments(StoreDocumentRequest $request): \Illuminate\Support\Collection
{
    $ids = collect();

    $taggedUsers = collect($request->tagged_users ?? []);
    $taggedUnits = collect($request->tagged_units ?? []);

    // Pair each tagged_users[i] with tagged_units[i]
    $pairs = $taggedUsers->zip($taggedUnits);

    foreach ($pairs as [$userId, $unitId]) {

        // "All Units / All Personnel" → tag every active assignment
        if ($userId === 'all' && $unitId === 'all') {
            return UserAssignment::where('is_current', true)
                ->where('id', '!=', $request->assignment_id)
                ->pluck('id');
        }

        // "All Personnel (Unit X)" → tag all active assignments in that unit
        if ($userId === 'all' && $unitId !== 'all') {
            $unitAssignments = UserAssignment::where('unit_id', (int) $unitId)
                ->where('is_current', true)
                ->where('id', '!=', $request->assignment_id)
                ->pluck('id');

            $ids = $ids->merge($unitAssignments);
            continue;
        }

        // Specific user
        $ids->push((int) $userId);
    }

    return $ids
        ->filter(fn($id) => !is_null($id) && $id !== (int) $request->assignment_id)
        ->unique()
        ->values();
}
    private function generateReferenceNumber(): string
    {
        $year  = now()->format('y');   // e.g. "26"
        $month = now()->format('m');   // e.g. "03"
        $day   = now()->format('d');   // e.g. "17"

        $todayPrefix = "REF-{$year}-{$month}{$day}-";

        // Count documents created today with this prefix, then increment
        $countToday = Document::where('reference_number', 'like', $todayPrefix . '%')->count();

        $sequence = str_pad($countToday + 1, 4, '0', STR_PAD_LEFT); // e.g. "0001"

        return $todayPrefix . $sequence;
    }
}

