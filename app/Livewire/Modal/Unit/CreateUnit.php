<?php

namespace App\Livewire\Modal\Unit;

use App\Models\Unit;
use Livewire\Component;

class CreateUnit extends Component
{
    public string $unit_name = '';
    public string $abbreviation = '';
    public string $description = '';

    protected function rules(): array
    {
        return [
            'unit_name' => ['required', 'string', 'max:255', 'unique:units,unit_name'],
            'abbreviation' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

public function createUnit(): void
{
    $validated = $this->validate();
    //dd($validated);

    Unit::create($validated);


    // session()->flash('success', 'Unit created successfully.');
    // $this->redirectRoute('units'); 

    // Close modal and show success message
        $this->dispatch('close-create-modal');
        $this->dispatch('unit-success', message: 'Unit created successfully.');
}

    public function render()
    {
        return view('livewire.modal.unit.create-unit');
    }
}

?>
