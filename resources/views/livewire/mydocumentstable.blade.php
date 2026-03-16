
{{-- Everything below the PHP tag is the Blade template --}}
<div class="bg-white rounded-xl border border-gray-100 p-10 shadow-sm overflow-hidden">
    <div class="mb-5">
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
                    <div
                        x-data="{ open: false, selected: @entangle('perPage') }"
                        class=" w-16 ">
                        <!-- Dropdown button -->
                        <button
                            @click="open = !open"
                            type="button"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-gray-500 focus:border-2 focus:border-brand-blue  w-full p-2.5 
                                    flex justify-between items-center">
                            <span x-text="selected"></span>
                            <x-heroicon-s-chevron-down class="w-4 h-4" />
                        </button>
                        <!-- Dropdown menu -->
                        <ul
                            x-show="open"
                            @click.outside="open = false"
                            x-cloak
                            class="absolute w-16 mt-1  bg-white border border-gray-300 rounded-lg shadow-lg">
                            @foreach ([5, 10, 20, 50, 100] as $value)
                            <li
                                @click="selected = {{ $value }}; $wire.set('perPage', {{ $value }}); open = false"
                                class="cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-brand-blue hover:text-white transition"
                                :class="{ 'bg-gray-800 text-white': selected == {{ $value }} }">
                                {{ $value }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
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
                        <option value="On going">On going</option>
                        <option value="Completed">Completed</option>
                        <option value="Late">Late</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

<!--My Documents Table-->
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
                        <td class="px-6 py-6 font-medium text-gray-800">{{ $doc->reference_number?? 'N/A'  }}</td>
                        <td class="px-6 py-6 font-medium text-gray-700 truncate max-w-xs">{{ $doc->document_name ?? 'N/A'  }}</td>
                        <td class="px-6 py-6 text-gray-700 font-medium">
                            {{ $doc->transactions->sortByDesc('created_at')->first()->action->action_name ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-6 text-gray-700 font-medium">{{ $doc->source_type ?? 'N/A'  }}</td> <!-- papalitan pa to, dapat source unit/sender name-->
                        <td class="px-6 py-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($doc->status->status_name == 'On going')
                                    bg-[#F28911]/20 text-[#F28911]
                                @elseif($doc->status->status_name == 'Completed')
                                    bg-[#25DF4D]/20 text-[#25DF4D]
                                @elseif($doc->status->status_name == 'Late')
                                    bg-[#E73C3C]/20 text-[#E73C3C]
                                @else
                                    bg-gray-100 text-gray-800
                                @endif
                            ">
                                {{ $doc->status->status_name ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="px-6 py-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($doc->priorityLevel->priority_name == 'Urgent')
                                    bg-[#F28911]/20 text-[#F28911]
                                @elseif($doc->priorityLevel->priority_name == 'Routinary')
                                    bg-[#1086B2]/20 text-[#1086B2]
                                @elseif($doc->priorityLevel->priority_name == 'Express')
                                    bg-[#E73C3C]/20 text-[#E73C3C]
                                @elseif ($doc->priorityLevel->priority_name == 'Rush')
                                    bg-[#EFCB00]/20 text-[#EFCB00]
                                @else
                                    bg-gray-100 text-gray-800
                                @endif
                            ">
                                {{ $doc->priorityLevel->priority_name ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="px-6 py-6 text-gray-600 font-medium">{{ $doc->deadline ?? 'N/A' }}</td>
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

    <!-- Pagination -->
    <div class="mt-4">
        {{ $documents->links('pagination::custom-pagination-links') }}
    </div>
    
</div>