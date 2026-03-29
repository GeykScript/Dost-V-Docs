<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\UserAssignment;
use Illuminate\Support\Facades\Log;

class UserAssignmentsTable extends Component
{
    // Enables Livewire's pagination to work without full page reloads
    use WithPagination; 

    public User $user;
    public $availableUnits;

    // Bound to the entangle('perPage') and wire:model.live="statusFilter" in your Blade
    public $perPage = 10;
    public $statusFilter = '';

    // For your alert message component
    public $successMessage;
    public $errorMessage;

    // Listen for events from your assign/edit modals to trigger a refresh and show alerts
    protected $listeners = [
        'assignmentSaved' => 'handleAssignmentSaved',
        'assignmentDeleted' => 'handleAssignmentDeleted'
    ];

    public function mount(User $user, $availableUnits)
    {
        $this->user = $user;
        $this->availableUnits = $availableUnits;
    }

    // Lifecycle hook: Runs automatically when $statusFilter changes
    public function updatedStatusFilter()
    {
        $this->resetPage(); // Go back to page 1 when filtering
    }

    // Lifecycle hook: Runs automatically when $perPage changes
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function handleAssignmentSaved($message = 'Assignment updated successfully.')
    {
        $this->successMessage = $message;
        $this->resetPage(); // Optional: reset to page 1 so they see the new/updated entry
    }

    public function handleAssignmentDeleted()
    {
        $this->successMessage = 'Assignment removed successfully.';
    }

    public function render()
    {
        // 1. Start the query: Get assignments for THIS user and eager load the Unit
        $query = UserAssignment::with(['unit' => function ($q) {
            $q->withTrashed(); // Include soft-deleted units
        }])
        ->where('user_id', $this->user->id);

        // 2. Apply the Active/Inactive filter
        if ($this->statusFilter === 'active') {
            $query->where('is_current', 1);
        } elseif ($this->statusFilter === 'inactive') {
            $query->where('is_current', 0);
        }

        // 3. Order the results: Active ones first, then by most recently created
        $assignments = $query->orderBy('is_current', 'desc')
                             ->orderBy('created_at', 'desc')
                             ->paginate($this->perPage);
        
        return view('livewire.admin.user-accounts.user-assignments-table', [
            'assignments' => $assignments
        ]);
    }
    public function setInactive($assignmentId)
    {
        try {
            // 1. Find the assignment, ensuring it belongs to the current user (security check)
            $assignment = UserAssignment::where('id', $assignmentId)
                ->where('user_id', $this->user->id)
                ->firstOrFail();

            // 2. Update it to be inactive and set the end date to today
            $assignment->update([
                'is_current' => false,
                'end_date' => now(),
            ]);

            // 3. Set the success message to show in your Blade UI
            $this->successMessage = 'Assignment successfully marked as inactive.';
            $this->errorMessage = null; // Clear any old errors

        } catch (\Exception $e) {
            // Log the error for debugging and show a friendly error message to the user
            Log::error('Failed to set assignment inactive: ' . $e->getMessage());
            
            $this->errorMessage = 'Failed to update the assignment. Please try again.';
            $this->successMessage = null;
        }
    }
}