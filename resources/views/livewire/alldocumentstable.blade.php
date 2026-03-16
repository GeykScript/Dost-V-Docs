
{{-- Everything below the PHP tag is the Blade template --}}
<div class="bg-white rounded-xl p-10 border border-gray-100 shadow-sm overflow-hidden">
        <div class="mb-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="bg-purple-50 p-2 rounded-lg">
                    <x-heroicon-o-clipboard-document-list class="w-5 h-5 text-purple-600" />
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-700">All Documents</h1>
                    <p class="text-xs text-gray-400 font-medium">Central Repository of Records</p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="flex gap-4 items-center">
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
                        <!-- Label -->
                        <p class="text-sm font-medium text-gray-900 md:block hidden">
                            entries per page
                        </p>
                    </div>
                </div>
                
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="col-span-4 md:col-span-4  flex flex-col items-center justify-center">
                        <input
                            wire:model.live.debounce.300ms="search"
                            type="text"
                            name="search"
                            class="w-full h-full focus:outline-none focus:ring-0 text-sm text-gray-900 placeholder:text-gray-500 border border-gray-300 rounded-lg px-3 focus-within:ring-1 focus-within:ring-sky-500 focus-within:border-sky-500"
                            placeholder="Search"
                            required />
                    </div>  
                    <div class="flex flex-col gap-1">
                        <select wire:model.live="filterYear" class="w-full h-full focus:outline-none focus:ring-0 text-sm text-gray-900 placeholder:text-gray-500 border border-gray-300 rounded-lg px-3 focus-within:ring-1 focus-within:ring-sky-500 focus-within:border-sky-500">
                            <option value="">All Years</option>
                                @foreach($years as $year)
                                    <option value="{{$year}}">{{ $year ?? '-'}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1">
                        <select wire:model.live="filterStatus" class="w-full h-full focus:outline-none focus:ring-0 text-sm text-gray-900 placeholder:text-gray-500 border border-gray-300 rounded-lg px-3 focus-within:ring-1 focus-within:ring-sky-500 focus-within:border-sky-500" :class="{ 'bg-brand-blue text-white': selected == {{ $value }} }">
                            <option value="">All Statuses</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->status_name}}">{{ $status->status_name ?? '-' }}</option>
                                @endforeach
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
            <tbody class="divide-y divide-gray-100"> <!-- Changed the fetching format -->
                @forelse($documents as $doc) 
                    <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer">
                        <td class="px-6 py-6 font-medium text-gray-800">{{ $doc->reference_number ?? 'N/A'}}</td>
                        <td class="px-6 py-6 font-medium text-gray-700 truncate max-w-xs">{{ $doc->document_name ?? 'N/A' }}</td>
                        <td class="px-6 py-6 text-gray-700 font-medium">{{ $doc->transactions->sortByDesc('created_at')->first()->action->action_name ?? 'N/A' }}</td> <!-- will display the latest -->
                        <td class="px-6 py-6 text-gray-700 font-medium">{{ $doc->user->unit->unit_name ?? 'N/A' }}</td> <!-- to be filled by unit source-->
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
                        <td class="px-6 py-6 text-gray-600 font-medium">{{ $doc->deadline->format('F j,Y, g:i A') ?? 'N/A'}}</td>
                    </tr>    
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-10 text-gray-500">
                            No documents found matching your filters.
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