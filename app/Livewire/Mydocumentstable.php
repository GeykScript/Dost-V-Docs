<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Document;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

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
        $query = Document::with(['user.unit', 'status'])->search($this->search);

        if ($this->filterYear) {
        $query->whereYear('created_at', $this->filterYear); // the years are based on the saved documents from the docs table
        } 

        if ($this->filterStatus) {
            $query->where('status_id', $this->filterStatus);
        }

        $statuses = Status::all();

        $years = Document::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year','desc')
            ->pluck('year');

        return view('livewire.mydocumentstable', [
            'documents' => $query->paginate($this->perPage),
            'years' => $years,
            'statuses' =>  $statuses
        ]);
    }
}