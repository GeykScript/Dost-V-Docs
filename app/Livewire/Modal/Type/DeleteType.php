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
             $this->type->delete();
            
            $this->dispatch('close-delete-modal');
            $this->dispatch('type-success', message: 'Type deleted successfully.');
    }

    public function render()
    {
        return view('livewire.modal.type.delete-type');
    }
}