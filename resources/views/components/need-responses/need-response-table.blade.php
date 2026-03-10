<?php

use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;
    
    public $search = '';

    public function render()
    {
        $allDocuments = collect([
            [
                'ref_no' => '2022-0505-0011',
                'name' => 'Memorandum of Agreement for Bicol University',
                'action' => 'For signature',
                'source' => 'MIS',
                'status' => 'Completed',
                'status_color' => 'bg-green-100 text-green-600',
                'priority' => 'Express',
                'priority_color' => 'bg-red-100 text-red-600',
                'deadline' => 'Sep 01, 2025'
            ],
            [
                'ref_no' => '2022-0505-0012',
                'name' => 'Memorandum of Agreement for Bicol University',
                'action' => 'For signature',
                'source' => 'MIS',
                'status' => 'Completed',
                'status_color' => 'bg-green-100 text-green-600',
                'priority' => 'Routinary',
                'priority_color' => 'bg-blue-100 text-blue-600',
                'deadline' => 'Sep 01, 2025'
            ],
            [
                'ref_no' => '2022-0505-0013',
                'name' => 'Memorandum of Agreement for Bicol University',
                'action' => 'For dissemination',
                'source' => 'MIS',
                'status' => 'Ongoing',
                'status_color' => 'bg-yellow-100 text-yellow-600',
                'priority' => 'Express',
                'priority_color' => 'bg-orange-100 text-orange-600',
                'deadline' => 'Sep 01, 2025'
            ],
        ]);

        $documents = $allDocuments->filter(function($doc) {
            return empty($this->search) || 
                   str_contains(strtolower($doc['ref_no']), strtolower($this->search)) ||
                   str_contains(strtolower($doc['name']), strtolower($this->search));
        });

        // FIX: Pass the variable explicitly to the view
        return view('components.need-responses.need-response-table', [
            'documents' => $documents
        ]);// layout(null) prevents it from wrapping in another layout if used as a component
    }

    // Since we called view('livewire.need-response-table'), 
    // we move the blade string to its own section or use the format below:
};
?>

{{-- Everything below the PHP tag is the Blade template --}}
<div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <div class="bg-gray-100 p-2 rounded-lg">
                <x-heroicon-s-document-text class="w-4 h-4 text-gray-600" />
            </div>
            <div class="flex flex-col leading-none">
                <h1 class="text-gray-700 font-semibold text-lg">Need Responses</h1>
                <p class="text-gray-600 font-medium text-xs">Documents routed to the user</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
            <div class="relative flex-grow sm:flex-grow-0">
                <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 h-4 w-4" />
                <input 
                    type="text"
                    wire:model.live="search"
                    placeholder="Search document..."
                    class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all"
                >
            </div>
            
            <button class="flex items-center justify-center gap-2 px-3 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors">
                <x-heroicon-o-funnel class="w-4 h-4" />
                <span>Filter</span>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold">
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
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $doc['ref_no'] }}</td>
                        <td class="px-6 py-4 font-medium text-gray-700 truncate max-w-xs">{{ $doc['name'] }}</td>
                        <td class="px-6 py-4 text-gray-700 font-medium">{{ $doc['action'] }}</td>
                        <td class="px-6 py-4 text-gray-700 font-medium">{{ $doc['source'] }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $doc['status_color'] }}">
                                {{ $doc['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $doc['priority_color'] }}">
                                {{ $doc['priority'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-medium">{{ $doc['deadline'] }}</td>
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