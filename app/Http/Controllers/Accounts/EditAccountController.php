<?php

namespace App\Http\Controllers\Accounts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAssignment;
use App\Models\Unit;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Log;

use App\Http\Requests\UserAccount\UserAccountEditRequest;

class EditAccountController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);

        $availableUnits = Unit::whereDoesntHave('userAssignments', function ($query) use ($id) {
            $query->where('user_id', $id)
                ->where('is_current', 1);
        })->get();

        return view('account.edit-account', compact('user', 'availableUnits'));
    }

    // The NEW method that saves the data
    public function update(UserAccountEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->update($validated);

        return back()->with('success', 'Profile details updated successfully.');
    }

    public function storeUnit(Request $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'unit_id' => 'required|exists:units,id',
            'position' => 'required|string',
        ]);

        // Check if position is Unit Head
        if (strtolower($validatedData['position']) === 'unit head') {
            $existingHead = UserAssignment::where('unit_id', $validatedData['unit_id'])
                ->where('position', 'Unit Head')
                ->where('is_current', 1) // only active assignments
                ->first();

            if ($existingHead) {
                return back()
                    ->withErrors(['position' => 'This unit already has an active Unit Head assigned.'])
                    ->withInput(); // This ensures Alpine can pick up the 'old' value
            }
        }

        // Create the new assignment
        $assignment = UserAssignment::create([
            'user_id' => $id,
            'unit_id' => $validatedData['unit_id'],
            'position' => $validatedData['position'],
            'end_date' => null,
            'is_current' => 1,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        return back()->with('success', 'Assignment created successfully.');
    }
}
