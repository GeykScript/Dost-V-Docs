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

use Illuminate\Support\Facades\Log;
class CreateDocumentController extends Controller
{
    public function index()
    {
        Log::info('CreateDocumentController@index called');

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

        Log::info('Fetched Create Document Data', [
            'types' => $types->toArray(),
            'priority_levels' => $priorityLevels->toArray(),
            'units' => $units->toArray(),
            'actions' => $actions->toArray(),
            'users' => $users->toArray(),
            'my_units' => $myUnits->toArray(),
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
}

