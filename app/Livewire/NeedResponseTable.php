<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Document;
use Livewire\WithPagination;
class NeedResponseTable extends Component
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
        $query = Document::search($this->search);
        return view('livewire.need-response-table',[
            'documents' => $query
                ->paginate($this->perPage)
        ]);
    }
}
