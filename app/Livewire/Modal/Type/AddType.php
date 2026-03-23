<?php

namespace App\Livewire\Modal\Type;
use App\Models\Type;
use Livewire\Component; 

class AddType extends Component
{
    public string $type_name = '';

    protected function rules(): array
    {
        return [
            'type_name' => ['required', 'string', 'max:255', 'unique:document_types,type_name'],
        ];
    }

public function addType(): void
{
    $validated = $this->validate();

    //dd($validated);

    Type::create($validated);

    $this->dispatch('close-create-modal');
    $this->dispatch('type-success', message: 'Type created successfully.');
}

    public function render()
    {
        return view('livewire.modal.type.add-type');
    }
}

?>