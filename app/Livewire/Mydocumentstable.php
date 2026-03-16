<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Document;

class Mydocumentstable extends Component
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
        $query = Document::search($this->search);

        return view('livewire.mydocumentstable', [
            'documents' => $query->paginate($this->perPage)
        ]);
    }
}