<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Document;

class Alldocumentstable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 6;
    public $filterYear = '';
    public $filterStatus = '';

    public function render()
    {
        $documents = Document::query()

            // Search Filter
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('reference_number', 'like', '%' . $this->search . '%')
                      ->orWhere('document_name', 'like', '%' . $this->search . '%');
                });
            })

            // Year Filter (assuming ref_no starts with year)
            ->when($this->filterYear, function ($query) {
                $query->where('reference_number', 'like', $this->filterYear . '%');
            })

            // Status Filter
            ->when($this->filterStatus, function ($query) {
                $query->where('status', $this->filterStatus);
            })

            ->paginate($this->perPage);

        return view('livewire.admin.alldocumentstable', [
            'documents' => $documents
        ]);
    }
}