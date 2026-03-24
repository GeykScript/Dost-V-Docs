<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserAccountsTable extends Component
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
        $query = User::search($this->search);
            return view('livewire.admin.user-accounts.user-accounts-table', [
            'users' => $query
                ->paginate($this->perPage)
            ]);
    }
}
