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
        dd($validated);

        // $this->unit->update($validated);

        // session()->flash('success', 'Unit updated successfully.');
    }

    public function render()
    {
        return view('livewire.modal.unit.edit-unit');
    }
}