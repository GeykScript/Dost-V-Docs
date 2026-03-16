<?php

namespace App\Livewire\Modal\Unit;

use App\Models\Unit;
use App\Models\UserAssignment;
use Livewire\Component;
use Illuminate\Validation\Rule;

class DeleteUnit extends Component
{
    public Unit $unit;

    public function deleteUnit(): void
    {
            // Check if unit has current user assignments
            if ($this->unit->userAssignments()->where('is_current', true)->exists()) {
                session()->flash('error', 'Cannot delete unit because it has active users.');
                $this->redirectRoute('units');
            }   
            else {
            // Soft delete
            $this->unit->delete();
            
            session()->flash('success', 'Unit deleted successfully.');
            $this->redirectRoute('units'); 
        }
    }

    public function render()
    {
        return view('livewire.modal.unit.delete-unit');
    }
}