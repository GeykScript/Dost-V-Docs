<?php

namespace App\Livewire\Modal\Unit;

use App\Models\Unit;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditUnit extends Component
{
    public Unit $unit;

    public string $unit_name = '';
    public string $abbreviation = '';
    public string $description = '';

    public function mount(Unit $unit)
    {
        $this->unit = $unit;

        $this->unit_name = $unit->unit_name;
        $this->abbreviation = $unit->abbreviation;
        $this->description = $unit->description ?? '';
    }

    protected function rules(): array
    {
        return [
            'unit_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('units', 'unit_name')->ignore($this->unit->id),
            ],
            'abbreviation' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function editUnit(): void
    {
        $validated = $this->validate();

       // Fill the model with validated data
        $this->unit->fill($validated);

        // Check if anything changed
        if (!$this->unit->isDirty()) {
            $this->dispatch('unit-success', message: 'No changes made.');
            return;
        }

        // Save only if changed
        $this->unit->save();

        // Close modal and show success message
        $this->dispatch('close-edit-modal');
        $this->dispatch('unit-success', message: 'Unit updated successfully.');
    }

    public function deleteUnit(): void
    {

    
        // Soft delete
        $this->unit->delete();

        $this->dispatch('close-delete-modal');
        $this->dispatch('unit-success', message: 'Unit deleted successfully.');

        
        // Reload the unit fresh with user assignments
        // Reload the Relationships fresh()
        // $unit = $this->unit->fresh(); 

        // // Check if unit has current user assignments
        // $hasActiveUsers = $unit->userAssignments()
        //                         ->where('is_current', 1)
        //                         ->exists();

        // if ($hasActiveUsers) {
        //     // Close modal and show error message
        //     $this->dispatch('close-delete-modal');
        //     $this->dispatch('unit-error', message: 'Cannot delete unit because it has active users.');
        //     return;
        // }

    }








    // Delete Unit function 
    //  public function deleteUnit(): void
    // {
    //         // Check if unit has current user assignments
    //         if ($this->unit->userAssignments()->where('is_current', true)->exists()) {
    //             session()->flash('error', 'Cannot delete unit because it has active users.');
    //             $this->redirectRoute('units');
    //         }   
    //         else {
    //         // Soft delete
    //        $this->unit->delete();
            
    //         session()->flash('success', 'Unit deleted successfully.');
    //         $this->redirectRoute('units'); 
    //     }
    // }

    public function render()
    {
        return view('livewire.modal.unit.edit-unit');
    }
}