<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Unit;
use Livewire\WithPagination;
class UnitTable extends Component
{
    use WithPagination;

    
    public $search = '';
    public $perPage = 10; 

    public function updatingSearch()
    {
        $this->resetPage(); // reset pagination when search changes 
    }

    public function updatedPerPage()
    {
        $this->resetPage(); // reset pagination when perPage changes
    }


    public function render()
    {
        $query = Unit::search($this->search)
            ->orderByDesc('id');

           return view('livewire.admin.unit-table', [
            'units' => $query
                ->paginate($this->perPage)
        ]);
    }
}
