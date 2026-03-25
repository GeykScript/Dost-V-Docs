
{{-- Everything below the PHP tag is the Blade template --}}
<div class="overflow-hidden">
 <!-- Main Content -->
    <div class="grid grid-cols-12 mb-4 gap-2 py-2  md:px-2">
                <!-- per page dropdown -->
                <div class="col-span-12 md:col-span-3 order-2 md:order-1">   
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
                                            :class="{ 'bg-brand-blue text-white': selected == {{ $value }} }">
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
                </div>
                
                <div class="col-span-12 md:col-span-9 grid grid-cols-12 gap-2 order-1 md:order-2">
                    <!-- SEARCH -->
                    <div class="col-span-12 md:col-span-5  flex flex-col items-center justify-center">
                        <input
                            wire:model.live.debounce.300ms="search"
                            type="text"
                            name="search"
                            class="w-full h-full focus:outline-none  text-sm text-gray-900 placeholder:text-gray-500 border border-gray-300 rounded-lg px-3 focus:ring-1 focus:ring-sky-500 focus:border-sky-500"
                            placeholder="Search"
                            required />
                    </div> 
                    <div class="col-span-12 md:col-span-1 flex items-center md:justify-center px-2 md:px-0">
                        <p class="text-xs font-semibold text-gray-600">Filter By:</p>
                    </div> 
                    <!-- YEAR FILTER -->
                    <div class="col-span-4 md:col-span-2">
                        <div
                            x-data="{ open: false, selected: @entangle('filterYear') }"
                            class="relative ">

                            <!-- Dropdown button -->
                            <button
                                @click="open = !open"
                                type="button"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-gray-500 focus:border-2 focus:border-brand-blue
                                    w-full p-2.5 flex justify-between items-center">
                                <span x-text="selected ? selected : 'All Years'"></span>
                                <x-heroicon-s-chevron-down class="w-4 h-4" />
                            </button>

                            <!-- Dropdown menu -->
                            <ul
                                x-show="open"
                                @click.outside="open = false"
                                x-cloak
                                class="absolute w-32 mt-1  bg-white border border-gray-300 rounded-lg shadow-lg z-10">
                                    <!-- All Years -->
                                    <li
                                        @click="selected = ''; $wire.set('filterYear',''); open=false"
                                        class="cursor-pointer px-4 py-2 text-sm transition"
                                        :class="selected == '' ? 'bg-brand-blue text-white' : 'text-gray-700 hover:bg-brand-blue hover:text-white'">
                                        All Years
                                    </li>

                                    @foreach ($years as $year)
                                        <li
                                            @click="selected = {{ $year }}; $wire.set('filterYear', {{ $year }}); open = false"
                                            class="cursor-pointer px-4 py-2 text-sm transition"
                                            :class="selected == {{ $year }} 
                                                ? 'bg-brand-blue text-white' 
                                                : 'text-gray-700 hover:bg-brand-blue hover:text-white'">
                                            {{ $year }}
                                        </li>
                                    @endforeach
                            </ul>
                        </div>  
                    </div>
                   <!-- Priority lvl Filter -->
                    <div class="col-span-4 md:col-span-2 flex flex-col gap-1">
                        <div
                            x-data="{ open: false, selectedLabel: 'All Levels' }"
                            class="relative">

                            <!-- Dropdown button -->
                            <button
                                @click="open = !open"
                                type="button"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-gray-500 focus:border-2 focus:border-brand-blue
                                    w-full p-2.5 flex justify-between items-center">

                                <span x-text="selectedLabel"></span>
                                <x-heroicon-s-chevron-down class="w-4 h-4" />
                            </button>

                            <!-- Dropdown menu -->
                            <ul
                                x-show="open"
                                @click.outside="open = false"
                                x-cloak
                                class="absolute w-32 mt-1 h-38 overflow-x-auto no-scrollbar bg-white border border-gray-300 rounded-lg shadow-lg z-10">

                                <!-- All Levels -->
                                <li
                                    @click="selectedLabel = 'All Levels'; $wire.set('filterPriority',''); open=false"
                                    class="cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-brand-blue hover:text-white"
                                    :class="{ 'bg-brand-blue text-white': selectedLabel == 'All Levels' }">
                                    All Levels
                                </li>

                                @foreach ($priorityLevels as $priority)
                                    <li
                                        @click="selectedLabel = '{{ $priority->priority_name }}'; $wire.set('filterPriority','{{ $priority->id }}'); open=false"
                                        class="cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-brand-blue hover:text-white"
                                        :class="{ 'bg-brand-blue text-white': selectedLabel == '{{ $priority->priority_name }}' }">
                                        {{ $priority->priority_name }}
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <!-- Status Filter  -->
                    <div class="col-span-4 md:col-span-2 flex flex-col gap-1">
                        <div
                            x-data="{ open: false, selectedLabel: 'All Status' }"
                            class="relative ">

                            <!-- Dropdown button -->
                            <button
                                        @click="open = !open"
                                        type="button"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-gray-500 focus:border-2 focus:border-brand-blue
                                            w-full p-2.5 flex justify-between items-center">

                                        <span x-text="selectedLabel"></span>
                                        <x-heroicon-s-chevron-down class="w-4 h-4" />
                            </button>

                            <!-- Dropdown menu -->
                            <ul
                                        x-show="open"
                                        @click.outside="open = false"
                                        x-cloak
                                        class="absolute w-32 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg z-10">

                                        <!-- All Statuses -->
                                        <li

                                            @click="selectedLabel = 'All Status'; $wire.set('filterStatus',''); open=false"
                                            class="cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-brand-blue hover:text-white"
                                            :class="{ 'bg-brand-blue text-white': selectedLabel == 'All Status' }">
                                            All Status
                                        </li>

                                        @foreach ($statuses as $status)
                                        <li
                                            @click="selectedLabel = '{{ $status->status_name }}'; $wire.set('filterStatus','{{ $status->id }}'); open=false"
                                            class="cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-brand-blue hover:text-white"
                                            :class="{ 'bg-brand-blue text-white': selectedLabel == '{{ $status->status_name }}' }">

                                            {{ $status->status_name }}

                                        </li>
                                        @endforeach
                            </ul>
                        </div>
                    </div> 
   
                </div>
    </div>

      <!--My Documents Table-->
    <div class="overflow-x-auto   ">
        <table class="w-full text-left text-sm mb-32 ">
            <thead class="bg-sidebar-bg text-white uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3 rounded-l-md">ref no.</th>
                    <th class="px-6 py-3">document name</th>
                    <th class="px-6 py-3">action</th>
                    <th class="px-6 py-3">Unit source</th>
                    <th class="px-6 py-3">status</th>
                    <th class="px-6 py-3">priority level</th>
                    <th class="px-6 py-3">deadline</th>
                    <th class="px-6 py-3 rounded-r-md">action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($documents as $doc) 
                    <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer">
                        <td class="px-6 py-6 font-medium text-gray-800">{{ $doc->reference_number ?? 'N/A'}}</td>
                        <td class="px-6 py-6 font-medium text-gray-700 truncate max-w-xs">{{ $doc->document_name ?? 'N/A' }}</td>
                        <td class="px-6 py-6 text-gray-700 font-medium">{{ $doc->transactions->sortByDesc('created_at')->first()->action->action_name ?? 'N/A' }}</td> <!-- will display the latest -->
                        <td class="px-6 py-6 text-gray-700 font-medium">{{ $doc->user->unit->abbreviation ?? 'N/A' }}</td> 
                        <td class="px-2 py-6">
                                <span @class([
                                    'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium',

                                    'bg-orange-100 text-orange-500' => $doc->status->status_name === 'On going',
                                    'bg-green-100 text-green-500' => $doc->status->status_name === 'Completed',
                                    'bg-red-100 text-red-500' => $doc->status->status_name === 'Late',
                                    'bg-gray-100 text-gray-800' => !in_array($doc->status->status_name ?? '', ['On going','Completed','Late']),
                                ])>
                                    {{ $doc->status->status_name ?? 'N/A' }}
                                </span>
                        </td>
                        <td class="px-6 py-6">
                            <span @class([
                                'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium',

                                'bg-orange-100 text-orange-500' => $doc->priorityLevel?->priority_name === 'Urgent',
                                'bg-blue-100 text-blue-500' => $doc->priorityLevel?->priority_name === 'Routinary',
                                'bg-red-100 text-red-500' => $doc->priorityLevel?->priority_name === 'Express',
                                'bg-yellow-100 text-yellow-500' => $doc->priorityLevel?->priority_name === 'Rush',

                                'bg-gray-100 text-gray-800' => !in_array($doc->priorityLevel?->priority_name ?? '', ['Urgent','Routinary','Express','Rush']),
                            ])>
                                {{ $doc->priorityLevel->priority_name ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="px-6 py-6 text-gray-600 font-medium">{{ $doc->deadline->format('F j,Y, g:i A') ?? 'N/A'}}</td>
                        <td class="px-6 py-6 text-gray-600 font-medium"><a href="#" class="text-sky-500 hover:text-sky-400 flex items-center text-sm gap-1">View<x-heroicon-o-information-circle class="w-5 h-5" /></a></td>

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