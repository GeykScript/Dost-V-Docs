<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Unit;
use Livewire\WithPagination;
class UnitTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 1; //

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
        $query = Unit::search($this->search);

           return view('livewire.unit-table', [
            'units' => $query
                ->paginate($this->perPage)
        ]);
    }
}
