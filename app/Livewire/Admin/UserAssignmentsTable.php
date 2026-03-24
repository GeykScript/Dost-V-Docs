<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\UserAssignment;

class UserAssignmentsTable extends Component
{
    // Enables Livewire's pagination to work without full page reloads
    use WithPagination; 

    public User $user;

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

    public function mount(User $user)
    {
        $this->user = $user;
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
        
        \Log::info('User Assignments Debug', [
            'user_id' => $this->user->id,
            'total' => $assignments->total(),
            'assignments' => $assignments->map(function ($a) {
                return [
                    'id' => $a->id,
                    'unit_id' => $a->unit_id,
                    'unit' => $a->unit ? $a->unit->toArray() : null,
                    'is_current' => $a->is_current,
                ];
            })->toArray(),
        ]);
        
        return view('livewire.admin.user-accounts.user-assignments-table', [
            'assignments' => $assignments
        ]);
    }
}