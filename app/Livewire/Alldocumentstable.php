<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Document;
use App\Models\User;

class Alldocumentstable extends Component
{
     use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $filterYear = '';
    public $filterStatus = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Document::with('user.unit')->search($this->search);

        return view('livewire.alldocumentstable', [
            'documents' =>  $query->paginate($this->perPage)
        ]);
    }
}