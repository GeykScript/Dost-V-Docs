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

    dd($validated);

    //Type::create($validated);

    session()->flash('success', 'Type created successfully.');

   // Redirect to the Document Types page
    $this->redirectRoute('type'); // use the route name from your routes file
}

    public function render()
    {
        return view('livewire.modal.type.add-type');
    }
}

?>