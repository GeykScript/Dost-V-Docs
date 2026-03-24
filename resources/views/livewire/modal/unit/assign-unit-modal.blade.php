<div>
    <x-primary-button 
        type="button" 
        wire:click="$set('showModal', true)"
        class="bg-sky-500 hover:bg-sky-600 text-white flex items-center gap-2">
        <x-heroicon-s-plus class="w-4 h-4" />
        {{ __('Assign to Another Unit') }}
    </x-primary-button>

    <div 
        x-data="{ show: @entangle('showModal') }"
        x-show="show"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6 sm:px-0"
        @keydown.escape.window="show = false"
    >
        <div x-show="show" 
             x-transition.opacity 
             class="fixed inset-0 bg-gray-900/50"
             >
        </div>

        <div x-show="show" 
             x-transition.scale.95 
             class="relative bg-white rounded-xl shadow-xl w-full max-w-lg overflow-hidden z-10">
            
            <form wire:submit.prevent="save">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h3 class="text-lg font-bold text-gray-800">Assign New Unit</h3>
                    <button type="button" wire:click="resetForm" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <x-heroicon-o-x-mark class="w-5 h-5" />
                    </button>
                </div>

                <div class="p-6 space-y-5">
                    
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

                    <div>
                        <x-input-label for="position" class="mb-1">
                            {{ __('Position') }} <span class="text-red-500">*</span>
                        </x-input-label>
                        
                        <x-dropdown align="left" width="w-full">
                            <x-slot name="trigger">
                                <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 p-2.5 shadow-sm">
                                    <span class="{{ $position ? 'text-gray-900' : 'text-gray-500' }}">
                                        {{ $position ?: 'Select Position...' }}
                                    </span>
                                    <x-heroicon-s-chevron-down class="w-4 h-4 text-gray-400" />
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="py-1">
                                    @foreach($availablePositions as $pos)
                                        <button 
                                            type="button" 
                                            wire:click="selectPosition('{{ $pos }}')"
                                            class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-sky-50 hover:text-sky-700 {{ $position === $pos ? 'bg-sky-50 font-semibold text-sky-700' : '' }}">
                                            {{ $pos }}
                                        </button>
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-dropdown>
                        <x-input-error :messages="$errors->get('position')" class="mt-2 text-xs text-red-600" />
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 flex items-center justify-end gap-3 rounded-b-xl border-t border-gray-100">
                    <button 
                        type="button" 
                        wire:click="resetForm"
                        class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                        Cancel
                    </button>
                    <x-primary-button type="submit" class="bg-sky-500 hover:bg-sky-600">
                        {{ __('Save Assignment') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>