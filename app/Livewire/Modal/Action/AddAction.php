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
    //dd($validated);
    
    Action::create($validated);

   // Close modal and show success message
        $this->dispatch('close-create-modal');
        $this->dispatch('action-success', message: 'Action created successfully.');
}

    public function render()
    {
        return view('livewire.modal.action.add-action');
    }
}

?>
