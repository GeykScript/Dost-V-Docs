<?php

namespace App\Livewire\Modal\Action;

use App\Models\Action;
use Livewire\Component;
use Illuminate\Validation\Rule;

class DeleteAction extends Component
{
    public Action $action;


    public function deleteAction(): void
        {
            // Use Laravel SoftDeletes
            $this->action->delete();

         // Close modal and show success message
        $this->dispatch('close-delete-modal');
        $this->dispatch('action-success', message: 'Action deleted successfully.');
    }

    public function render()
    {
        return view('livewire.modal.action.delete-action');
    }
}