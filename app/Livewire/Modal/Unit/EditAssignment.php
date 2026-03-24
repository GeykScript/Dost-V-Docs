<?php

namespace App\Livewire\Modal\Unit;

use Livewire\Component;
use App\Models\UserAssignment;

class EditAssignment extends Component
{
    public UserAssignment $assignment;

    public function mount(UserAssignment $assignment)
    {
        $this->assignment = $assignment;
    }

    public function setInactive()
    {
        // Mark as inactive and optionally set the end date to today
        $this->assignment->update([
            'is_current' => 0,
            'end_date' => now()->toDateString(), 
        ]);

        // Tell Alpine to close the modal
        $this->dispatch('close-inactive-modal');
        
        // Tell the parent table to refresh and show success message
        $this->dispatch('assignmentSaved', message: 'Assignment has been set to inactive.');
    }

    public function render()
    {
        return view('livewire.modal.unit.edit-assignment');
    }
}