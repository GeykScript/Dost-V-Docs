<div class="overflow-hidden">
    
    <header class="mb-6 px-2 md:px-0">
        <div class="flex gap-2 items-center">
            <x-heroicon-o-briefcase class="w-6 h-6 text-gray-800" />
            <h2 class="text-lg md:text-xl text-gray-800 font-bold">
                {{ __('User Assignments') }}
            </h2>
        </div>
        <p class="mt-1 text-xs text-gray-600">
            {{ __('Manage the units and positions assigned to this employee. You can assign new units or mark current ones as inactive.') }}
        </p>
    </header>

    <x-alert-message :success-message="$successMessage" :error-message="$errorMessage" />

    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-4 gap-4 py-2 px-2 md:px-0">
        
        <div class="flex items-center gap-3 w-full lg:w-auto order-2 lg:order-1">
            <div
                x-data="{ open: false, selected: @entangle('perPage') }"
                class="relative w-20">
                <button
                    @click="open = !open"
                    type="button"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-2 focus:ring-sky-500 focus:border-sky-500 w-full px-3 py-2.5 
                            flex justify-between items-center transition-all">
                    <span x-text="selected" class="font-medium"></span>
                    <x-heroicon-s-chevron-down class="w-4 h-4 text-gray-500" />
                </button>
                <ul
                    x-show="open"
                    @click.outside="open = false"
                    x-cloak
                    x-transition.opacity
                    class="absolute z-20 w-20 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
                    @foreach ([5, 10, 20, 50, 100] as $value)
                    <li
                        @click="selected = {{ $value }}; $wire.set('perPage', {{ $value }}); open = false"
                        class="cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-sky-50 hover:text-sky-700 transition-colors"
                        :class="{ 'bg-sky-50 font-bold text-sky-700': selected == {{ $value }} }">
                        {{ $value }}
                    </li>
                    @endforeach
                </ul>
            </div>
            <p class="text-sm font-medium text-gray-900 md:block hidden">
                entries per page
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto order-1 lg:order-2">
            <div class="w-full sm:w-48">
                <select 
                    wire:model.live="statusFilter" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-sky-500 block w-full px-3 py-2.5 cursor-pointer transition-all">
                    <option value="">All Assignments</option>
                    <option value="active">Active Only</option>
                    <option value="inactive">Inactive / Past</option>
                </select>
            </div>  
            
            <div class="w-full sm:w-auto">
                @include('account.modals.assign-unit-modal', ['availableUnits' => $availableUnits])
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-sidebar-bg text-white uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3 rounded-l-md" colspan="2">Unit Name</th>
                    <th class="px-6 py-3">Position</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">End Date</th>
                    <th class="px-6 py-3 rounded-r-md text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($assignments as $assignment)
                    <tr class="hover:bg-gray-100/50 transition-colors">
                        <td class="px-6 py-1.5 md:py-4 font-medium text-gray-700 truncate max-w-xs" colspan="2">
                            {{ $assignment->unit->unit_name ?? 'Unknown Unit' }}
                        </td>
                        <td class="px-6 py-1.5 md:py-4 text-gray-700 font-medium">
                            {{ $assignment->position ?? '--' }}
                        </td>
                        <td class="px-6 py-1.5 md:py-4 text-gray-700 font-medium">
                            @if($assignment->is_current)
                                <span class="text-green-500 text-xs font-semibold flex items-center gap-0.5">
                                    Active
                                    <x-heroicon-s-check-circle class="w-4 h-4 mr-1" />
                                </span>
                            @else
                                <span class="text-gray-500 text-xs font-semibold flex items-center gap-0.5">
                                    Inactive
                                    <x-heroicon-s-minus-circle class="w-4 h-4 mr-1" />
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-1.5 md:py-4 text-gray-700 font-medium">
                            @if($assignment->end_date)
                                {{ \Carbon\Carbon::parse($assignment->end_date)->format('M d, Y') }}
                            @else
                                <span class="text-gray-400 italic">Present</span>
                            @endif
                        </td>
                        <td class="px-6 py-1.5 md:py-4 text-gray-600 font-medium flex justify-center gap-2">
                            @if($assignment->is_current)
                                <livewire:modal.unit.edit-assignment :assignment="$assignment" wire:key="edit-assignment-{{ $assignment->id }}" />
                            @else
                                <button 
                                    type="button"
                                    disabled
                                    class="bg-gray-50 text-gray-400 border border-gray-200 px-3 py-1.5 rounded-md text-xs font-medium flex items-center gap-1 cursor-not-allowed">
                                    <x-heroicon-s-minus-circle class="w-4 h-4" /> Set Inactive
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-10 text-gray-500">
                            No unit assignments found for this user.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $assignments->links('pagination::custom-pagination-links') }}
    </div>
</div>