<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Action;
use Livewire\WithPagination;

class ActionsTable extends Component
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
        $query = Action::search($this->search);
        return view('livewire.actions-table', [
            'actions' => $query
                ->paginate($this->perPage)
        ]);
    }
}
