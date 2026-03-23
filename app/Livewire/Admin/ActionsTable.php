<?php

namespace App\Livewire\Admin;
use Livewire\Component;
use App\Models\Action;
use Livewire\WithPagination;

class ActionsTable extends Component
{

    use WithPagination;

      protected $listeners = [
        'action-success' => 'handleSuccess',
        'action-error' => 'handleError',
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
        $query = Action::search($this->search)
                ->withTrashed();

        return view('livewire.admin.actions-table', [
            'actions' => $query
                ->paginate($this->perPage)
        ]);
    }
}
