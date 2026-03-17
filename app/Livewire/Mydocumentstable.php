<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Document;
use App\Models\Status;
use App\Models\PriorityLevel;
use Illuminate\Support\Facades\DB;

class Mydocumentstable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $filterYear = '';
    public $filterStatus = '';
    public $filterPriority = '';



    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedFilterYear()
{
    $this->resetPage();
}

public function updatedFilterStatus()
{
    $this->resetPage();
}

public function updatedFilterPriority()
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

        if ($this->filterPriority) {
            $query->where('priority_lvl_id', $this->filterPriority);
        }



        $statuses = Status::all();
        $priorityLevels = PriorityLevel::all();

        $years = Document::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year','desc')
            ->pluck('year');

        return view('livewire.mydocumentstable', [
            'documents' => $query->paginate($this->perPage),
            'years' => $years,
            'statuses' =>  $statuses,
            'priorityLevels' => $priorityLevels
        ]);
    }
}