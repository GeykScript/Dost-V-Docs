<div x-data="{ 
    assignUnitOpen: {{ $errors->has('position') ? 'true' : 'false' }}, 
    isSubmitting: false 
}">

    <x-primary-button 
        type="button"
        @click="assignUnitOpen = true"
        class="bg-sky-500 hover:bg-sky-600 text-white flex items-center gap-2">
        <x-heroicon-s-plus class="w-4 h-4" />
        {{ __('Assign to Another Unit') }}
    </x-primary-button>

    <div
        x-cloak
        x-show="assignUnitOpen"
        style="display: none;"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
        @keydown.escape.window="assignUnitOpen = false">

        <div
            x-show="assignUnitOpen"
            x-transition.opacity
            class="absolute inset-0 bg-black/50"
            @click="assignUnitOpen = false">
        </div>

        <div
            x-show="assignUnitOpen"
            x-transition.scale
            class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-xl overflow-hidden">

            <div class="flex items-center justify-between px-7 py-6 border-b">
                <div class="flex items-center gap-1.5">
                    <div class="bg-gray-100 p-2 rounded-lg">
                        <x-heroicon-s-building-office class="w-5 h-5 text-gray-600" />
                    </div>
                    <div>
                        <h1 class="text-md font-bold text-gray-700 leading-none">
                            Assign New Unit
                        </h1>
                        <p class="text-xs text-gray-400 leading-none mt-1">
                            Select unit and position.
                        </p>
                    </div>
                </div>
            </div>

            <form action="{{ route('accounts.assignment.store', $user->id) }}" 
                  method="POST" 
                  class="px-7 py-6 space-y-5" 
                  id="AssignUnitForm"
                  @submit="isSubmitting = true">
                @csrf

                <div>
                    <x-native-searchable-select 
                        id="unit_id"
                        name="unit_id"
                        label="Select or Search Unit"
                        :required="true"
                        :results="$availableUnits"
                        valueField="id"
                        displayField="unit_name"
                        subDisplayField="abbreviation"
                        emptyMessage="No available units found."
                    />
                </div>

                <div x-data="{ 
                    positionOpen: false, 
                    selectedPosition: '{{ old('position') }}',
                    positions: ['Unit Head', 'Staff'],
                    hasError: {{ $errors->has('position') ? 'true' : 'false' }}
                }">
                    <div class="flex justify-between items-center mb-1">
                        <label class="block text-xs font-bold text-gray-500">
                            Position <span class="text-red-500">*</span>
                        </label>
                        
                        @error('position')
                            <span x-show="hasError" class="text-[10px] font-bold text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative pb-4">
                        <input type="hidden" name="position" x-model="selectedPosition">

                        <button 
                            type="button"
                            @click="positionOpen = !positionOpen; hasError = false"
                            @click.outside="positionOpen = false"
                            class="w-full flex justify-between items-center bg-white border text-sm rounded-lg p-2.5 shadow-sm transition-all"
                            x-bind:class="hasError ? 'border-red-500 ring-1 ring-red-500' : 'border-gray-300 focus:ring-1 focus:ring-sky-500'">
                            
                            <span x-text="selectedPosition ? selectedPosition : 'Select Position...'" 
                                  x-bind:class="selectedPosition ? 'text-gray-900' : 'text-gray-400'">
                            </span>

                            {{-- Changed :class to x-bind:class here so Blade ignores it --}}
                            <x-heroicon-s-chevron-down class="w-4 h-4" x-bind:class="hasError ? 'text-red-500' : 'text-gray-400'" />
                        </button>

                        <div x-show="positionOpen"
                             x-transition
                             style="display: none;"
                             class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg max-h-40 overflow-y-auto">
                            <ul class="py-1">
                                <template x-for="pos in positions" :key="pos">
                                    <li>
                                        <button 
                                            type="button" 
                                            @click="selectedPosition = pos; positionOpen = false; hasError = false"
                                            class="w-full text-left px-4 py-2 text-sm hover:bg-sky-50 transition-colors"
                                            x-bind:class="selectedPosition === pos ? 'bg-sky-50 font-semibold text-sky-700' : 'text-gray-700'">
                                            <span x-text="pos"></span>
                                        </button>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2">
                    <button
                        type="button"
                        @click="assignUnitOpen = false"
                        x-bind:disabled="isSubmitting"
                        class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 hover:bg-gray-100 disabled:opacity-50">
                        Cancel
                    </button>

                    <button 
                        type="submit"
                        x-bind:disabled="isSubmitting"
                        class="flex justify-center items-center px-4 py-2 bg-sky-500 text-white rounded-lg text-sm font-semibold hover:bg-sky-600 transition-colors disabled:opacity-75">
                        
                        <svg x-show="isSubmitting" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" style="display: none;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>

                        <span x-text="isSubmitting ? 'Saving...' : 'Save Assignment'"></span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>