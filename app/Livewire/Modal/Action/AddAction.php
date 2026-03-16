<?php

namespace App\Livewire\Modal\Action;

use App\Models\Action;
use Livewire\Component;

class AddAction extends Component
{
    public string $action_name = '';

    protected function rules(): array
    {
        return [
            'action_name' => ['required', 'string', 'max:255', 'unique:action_lists,action_name'],
        ];
    }

public function addAction(): void
{
    $validated = $this->validate();
    dd($validated);
    
    //Action::create($validated);

    session()->flash('success', 'Action created successfully.');

   // Redirect to the Document Actions page
    $this->redirectRoute('action'); // use the route name from your routes file
}

    public function render()
    {
        return view('livewire.modal.action.add-action');
    }
}

?>
