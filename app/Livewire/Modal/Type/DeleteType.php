<?php

namespace App\Livewire\Modal\Type;

use App\Models\Type;
use Livewire\Component;
use Illuminate\Validation\Rule;

class DeleteType extends Component
{
    public Type $type;


    public function deleteType(): void
        {
            // Use Laravel SoftDeletes
            // $this->type->delete();
            
            dd($this->type);

            session()->flash('success', 'Type deleted successfully.');
            $this->redirectRoute('type'); // use the route name from your routes file
    }

    public function render()
    {
        return view('livewire.modal.type.delete-type');
    }
}