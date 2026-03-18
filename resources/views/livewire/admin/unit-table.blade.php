<div class="overflow-hidden">

    @if($successMessage)
    <div 
        wire:key="{{ $successMessage . uniqid() }}"
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        class="mb-3 rounded-lg border border-green-200 bg-green-100 px-4 py-3 text-sm font-medium text-green-500"
        x-transition
    >
        {{ $successMessage }}
    </div>
    @elseif ($errorMessage)
    <div 
        wire:key="{{ $errorMessage . uniqid() }}"
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        class="mb-3 rounded-lg border border-red-200 bg-red-100 px-4 py-3 text-sm font-medium text-red-500"
        x-transition
    >
        {{ $errorMessage }}
    </div>
    @endif

    <!-- main content  -->
    <div class="grid grid-cols-12 mb-4 gap-2 py-2 px-2 md:px-0">
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
                    class="w-full h-full focus:outline-none  text-sm text-gray-900 placeholder:text-gray-500 border border-gray-300 rounded-lg px-3 focus:ring-1 focus:ring-sky-500 focus:border-sky-500"
                    placeholder="Search"
                    required />
            </div>  
            <!-- create button modal  -->
                <livewire:modal.unit.create-unit />
        </div>
    </div>

    <!-- Unit Table  -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-800 text-white uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3 rounded-l-md" colspan="2">Name</th>
                    <th class="px-6 py-3">Abbreviation</th>
                    <th class="px-6 py-3" colspan="2">Description</th>
                    <th class="px-6 py-3">Users</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 rounded-r-md" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y  divide-gray-100">
                @forelse($units as $unit)
                    <tr class="hover:bg-gray-100/50 transition-colors ">
                        <td class="px-6 py-1.5 md:py-4 font-medium text-gray-700 truncate max-w-xs" colspan="2" >{{ $unit->unit_name }}</td>
                        <td class="px-6 py-1.5 md:py-4 text-gray-700 font-medium">{{ $unit->abbreviation }}</td>
                        <td class="px-6 py-1.5 md:py-4 text-gray-700 font-medium truncate max-w-md" colspan="2">{{ $unit->description }}</td>
                        <td class="px-6 py-1.5 md:py-4 text-gray-700 font-medium truncate max-w-md">
                            <span class="text-xs bg-orange-100 text-orange-600 rounded-full px-3 font-semibold py-1.5">
                                @if ($unit->active_user_assignments_count > 99)
                                    99+
                                @else
                                    {{ $unit->active_user_assignments_count }}
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-1.5 md:py-4 text-gray-700 font-medium truncate max-w-md">
                            @if($unit->trashed())
                                    <span class="text-red-500 text-xs font-semibold flex items-center gap-0.5">
                                        Deleted
                                        <x-heroicon-s-x-circle class="w-4 h-4  mr-1" />
                                    </span>
                                @else
                                    <span class="text-green-500 text-xs font-semibold flex items-center gap-0.5">
                                        Active
                                        <x-heroicon-s-check-circle class="w-4 h-4  mr-1" />
                                    </span>
                            @endif
                        </td>
                        <td class="px-6 py-1.5 md:py-4 text-gray-600 font-medium flex gap-2" colspan="2">
                            <!-- Edit modal with Delete modal inside  -->
                            <livewire:modal.unit.edit-unit :unit="$unit" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-10 text-gray-500">
                            No units found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $units->links('pagination::custom-pagination-links') }}
    </div>
</div>
