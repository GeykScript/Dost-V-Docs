<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Unit;
use Livewire\WithPagination;
class UnitTable extends Component
{
    use WithPagination;

    protected $listeners = [
        'unit-success' => 'handleSuccess',
        'unit-error' => 'handleError',
    ];    
    public $search = '';
    public $perPage = 10; 

    public $successMessage = null;
    public $errorMessage = null;


    public function handleSuccess($message = null)
    {
        $this->errorMessage = null;
        $this->successMessage = $message;
        $this->resetPage(); 
    }

    public function handleError($message = null)
    {
        
        $this->successMessage = null; // Clear any previous success message
        $this->errorMessage = $message;
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->successMessage = null;
        $this->errorMessage = null;
        $this->resetPage(); // reset pagination when search changes 
    }

    public function updatedPerPage()
    {
          $this->successMessage = null;
    $this->errorMessage = null;
        $this->resetPage(); // reset pagination when perPage changes
    }


    public function render()
    {
        $query = Unit::search($this->search)
            ->withTrashed()
            // Count user per unit, but only count those with no end_date 
            ->withCount('activeUserAssignments');

        return view('livewire.admin.unit-table', [
            'units' => $query->paginate($this->perPage)
        ]);
    }
}
