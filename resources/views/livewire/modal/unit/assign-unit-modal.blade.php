<div x-data="{ assignUnitOpen: false }">

    <!-- Trigger Button -->
    <x-primary-button 
        type="button"
        @click="assignUnitOpen = true"
        class="bg-sky-500 hover:bg-sky-600 text-white flex items-center gap-2">
        <x-heroicon-s-plus class="w-4 h-4" />
        {{ __('Assign to Another Unit') }}
    </x-primary-button>

    <!-- Modal Wrapper -->
    <div
        x-cloak
        x-show="assignUnitOpen"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
        @keydown.escape.window="assignUnitOpen = false">

        <!-- Backdrop -->
        <div
            x-show="assignUnitOpen"
            x-transition.opacity
            class="absolute inset-0 bg-black/50">
        </div>

        <!-- Modal Panel -->
        <div
            x-show="assignUnitOpen"
            x-transition.scale
            class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-xl overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-7 py-6 border-b">
                <div class="flex items-center gap-1.5">
                    <div class="bg-gray-100 p-2 rounded-lg">
                        <x-heroicon-s-building-office class="w-5 h-5 text-gray-600" />
                    </div>
                    <div>
                        <h1 class="text-md font-bold text-gray-700 leading-none">
                            Assign New Unit
                        </h1>
                        <p class="text-xs text-gray-400 leading-none">
                            Select unit and position.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Form -->
            <form wire:submit.prevent="save" class="px-7 py-6 space-y-5" id="AssignUnitForm">

                <!-- Searchable Select -->
                <x-searchable-select 
                    id="unitSearch"
                    label="Select or Search Unit"
                    :required="true"
                    model="unitSearch"
                    :results="$searchResults"
                    valueField="id"
                    displayField="unit_name"
                    subDisplayField="abbreviation"
                    selectMethod="selectUnit"
                    errorField="unitId"
                    emptyMessage="No available units found."
                />

                <!-- Position -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1">
                        Position <span class="text-red-500">*</span>
                    </label>

                    <x-dropdown align="left" width="w-full">
                        <x-slot name="trigger">
                            <button type="button"
                                class="w-full flex justify-between items-center bg-white border border-gray-300 text-sm rounded-lg p-2.5 shadow-sm focus:ring-1 focus:ring-sky-500">
                                
                                <span class="{{ $position ? 'text-gray-900' : 'text-gray-400' }}">
                                    {{ $position ?: 'Select Position...' }}
                                </span>

                                <x-heroicon-s-chevron-down class="w-4 h-4 text-gray-400" />
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @foreach($availablePositions as $pos)
                                <button 
                                    type="button" 
                                    wire:click="selectPosition('{{ $pos }}')"
                                    class="w-full text-left px-4 py-2 text-sm hover:bg-sky-50
                                        {{ $position === $pos ? 'bg-sky-50 font-semibold text-sky-700' : 'text-gray-700' }}">
                                    {{ $pos }}
                                </button>
                            @endforeach
                        </x-slot>
                    </x-dropdown>

                    @error('position')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button
                        type="button"
                        @click="assignUnitOpen = false"
                        class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500">
                        Cancel
                    </button>

                    <x-loading-livewire-button 
                        wireTarget="save"
                        formId="AssignUnitForm"
                        class="flex justify-center items-center bg-sky-500 hover:bg-sky-400">
                        {{ __('Save Assignment') }}
                    </x-loading-livewire-button>
                </div>

            </form>
        </div>
    </div>
</div>