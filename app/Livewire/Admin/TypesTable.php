<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Type;
use Livewire\WithPagination;

class TypesTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10; //

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
        $query = Type::search($this->search);
        return view('livewire.admin.types-table',[
            'types' => $query
                ->paginate($this->perPage)
        ]);
    }
}
