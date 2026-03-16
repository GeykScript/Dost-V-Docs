<div class="overflow-hidden">
    @if(session('success'))
    <div class="mb-3 rounded-lg border border-green-200 bg-green-100 px-4 py-3 text-sm font-medium text-green-500">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-12 mb-4 gap-2">
        <!-- per page dropdown -->
        <div class="col-span-12 md:col-span-6 order-2 md:order-1">
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
        <div class="col-span-12 md:col-span-6 grid grid-cols-6 gap-2 order-1 md:order-2">
            <!-- search input  -->
            <div class="col-span-4 md:col-span-4  flex flex-col items-center justify-center">
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    name="search"
                    class="w-full h-full focus:outline-none focus:ring-0 text-sm text-gray-900 placeholder:text-gray-500 border border-gray-300 rounded-lg px-3 focus-within:ring-1 focus-within:ring-sky-500 focus-within:border-sky-500"
                    placeholder="Search"
                    required />
            </div>
            <livewire:modal.action.add-action/>   
        </div>
    </div>

    <!-- Unit Table  -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-500 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3" colspan="2">Action</th>
                    <th class="px-6 py-3">Created At</th>
                    <th class="px-6 py-3" colspan="2" >Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($actions as $action)
                    <tr class="hover:bg-gray-100/50 transition-colors ">
                        <td class="px-6 py-4 font-medium text-gray-700 truncate max-w-xs" colspan="2">{{ $action->action_name }}</td>
                        <td class="px-6 py-4 text-gray-700 font-medium">{{ $action->created_at->format('F j, Y, g:i A') }}</td>
                        <td class="px-6 py-4 text-gray-700 font-medium flex gap-2" colspan="2">
                            <!-- <button class="bg-sky-500 text-white px-3 py-2 rounded-md text-sm flex items-center gap-1 cursor-pointer"><x-heroicon-s-pencil-square class="w-4 h-4" />Edit</button> -->
                            <livewire:modal.action.delete-action :action="$action"/>
                        </td>                
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-500">
                            No units found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $actions->links('pagination::custom-pagination-links') }}
    </div>
</div>