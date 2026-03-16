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

            //dd($this->action);

            session()->flash('success', 'Action deleted successfully.');
            $this->redirectRoute('action'); // use the route name from your routes file
    }

    public function render()
    {
        return view('livewire.modal.action.delete-action');
    }
}