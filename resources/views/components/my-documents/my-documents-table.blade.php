<?php

use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;
    
    public $search = '';
    public $perPage = 6;
    public $filterYear = '';
    public $filterStatus = '';

    public function render()
    {
        $allDocuments = collect([
            [
                'ref_no' => '2023-1120-0045',
                'name' => 'Leave Application - Annual Vacation',
                'action' => 'For Approval',
                'source' => 'HR Unit',
                'status' => 'Ongoing',
                'status_color' => 'bg-yellow-100 text-yellow-600',
                'priority' => 'Routinary',
                'priority_color' => 'bg-blue-100 text-blue-600',
                'deadline' => 'Oct 15, 2025'
            ],
            [
                'ref_no' => '2023-1120-0046',
                'name' => 'Purchase Request for Department IT Equipment',
                'action' => 'For Signature',
                'source' => 'Supply Unit',
                'status' => 'Completed',
                'status_color' => 'bg-green-100 text-green-600',
                'priority' => 'Urgent',
                'priority_color' => 'bg-orange-100 text-orange-600',
                'deadline' => 'Oct 20, 2025'
            ],
            [
                'ref_no' => '2023-1120-0047',
                'name' => 'Travel Order - Regional Conference 2025',
                'action' => 'For Review',
                'source' => 'RMU',
                'status' => 'Ongoing',
                'status_color' => 'bg-yellow-100 text-yellow-600',
                'priority' => 'Express',
                'priority_color' => 'bg-red-100 text-red-600',
                'deadline' => 'Oct 25, 2025'
            ],
        ]);

        $documents = $allDocuments->filter(function($doc) {
            return empty($this->search) || 
                   str_contains(strtolower($doc['ref_no']), strtolower($this->search)) ||
                   str_contains(strtolower($doc['name']), strtolower($this->search));
        });

        // Updated the view path to reflect "my-documents"
        return view('components.my-documents.my-documents-table', [
            'documents' => $documents
        ]);
    }
};
?>

{{-- Everything below the PHP tag is the Blade template --}}
<div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-6">
        <div class="flex items-center gap-3 mb-2">
            <div class="bg-blue-50 p-2 rounded-lg">
                <x-heroicon-s-document-text class="w-5 h-5 text-blue-500" />
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-700">My Documents</h1>
                <p class="text-xs text-gray-400 font-medium">Documents Authored or Owned by You</p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <select wire:model.live="perPage" class="bg-gray-50 border border-gray-200 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">
                        <option value="6">6</option>
                        <option value="12">12</option>
                        <option value="24">24</option>
                    </select>
                    <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400 -ml-8 pointer-events-none" />
                </div>
                <p class="text-xs text-gray-600">entries per page</p>
            </div>
            

            <div class="flex flex-col lg:flex-row gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-bold text-gray-500 ml-1">Search</label>
                    <input type="text" wire:model.live="search" class="bg-gray-50 border border-gray-200 text-sm rounded-lg w-full lg:w-96 p-2 focus:outline-none">
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-bold text-gray-500 ml-1">Filter by Year</label>
                    <select wire:model.live="filterYear" class="bg-gray-50 border border-gray-200 text-sm rounded-lg w-full sm:w-48 p-2 text-gray-400 focus:outline-none">
                        <option value="">Select Year</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-bold text-gray-500 ml-1">Filter by Status</label>
                    <select wire:model.live="filterStatus" class="bg-gray-50 border border-gray-200 text-sm rounded-lg w-full sm:w-48 p-2 text-gray-400 focus:outline-none">
                        <option value="">Select Status</option>
                        <option value="draft">Draft</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-500 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3">ref no.</th>
                    <th class="px-6 py-3">document name</th>
                    <th class="px-6 py-3">action</th>
                    <th class="px-6 py-3">Unit source</th>
                    <th class="px-6 py-3">status</th>
                    <th class="px-6 py-3">priority level</th>
                    <th class="px-6 py-3">deadline</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($documents as $doc)
                    <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer">
                        <td class="px-6 py-6 font-medium text-gray-800">{{ $doc['ref_no'] }}</td>
                        <td class="px-6 py-6 font-medium text-gray-700 truncate max-w-xs">{{ $doc['name'] }}</td>
                        <td class="px-6 py-6 text-gray-700 font-medium">{{ $doc['action'] }}</td>
                        <td class="px-6 py-6 text-gray-700 font-medium">{{ $doc['source'] }}</td>
                        <td class="px-6 py-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $doc['status_color'] }}">
                                {{ $doc['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $doc['priority_color'] }}">
                                {{ $doc['priority'] }}
                            </span>
                        </td>
                        <td class="px-6 py-6 text-gray-600 font-medium">{{ $doc['deadline'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-10 text-gray-500">
                            No documents found matching your search.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>