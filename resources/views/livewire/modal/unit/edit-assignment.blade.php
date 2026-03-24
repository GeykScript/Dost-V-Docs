<div x-data="{ inactiveOpen: false }" class="flex items-center justify-center">

    <button 
        type="button"
        @click="inactiveOpen = true"
        class="bg-white text-orange-500 border border-orange-500 hover:bg-orange-50 px-3 py-1.5 rounded-md text-xs font-medium flex items-center gap-1 transition-colors">
        <x-heroicon-s-minus-circle class="w-4 h-4" /> Set Inactive
    </button>

    <div
        x-cloak
        x-show="inactiveOpen"
        x-on:close-inactive-modal.window="inactiveOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6 text-left"
        @keydown.escape.window="inactiveOpen = false">

        <div
            x-show="inactiveOpen"
            x-transition.opacity
            class="absolute inset-0 bg-black/50">
        </div>

        <div
            x-show="inactiveOpen"
            x-transition.scale
            class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-xl overflow-hidden">

            <form wire:submit.prevent="setInactive" class="px-7 py-6 space-y-4" id="SetInactiveForm-{{ $assignment->id }}">
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12 flex flex-col items-center justify-center">
                        <div class="flex p-4 items-center justify-center rounded-full w-20 h-20 bg-orange-500">
                            <x-heroicon-s-exclamation-triangle class="text-2xl text-white" />
                        </div>
                        <h1 class="text-center text-xl font-bold text-gray-700 mt-4 mb-2">Set as Inactive?</h1>
                        <p class="text-center text-xs text-gray-500">This will mark the user's assignment to <span class="font-bold text-gray-700">{{ $assignment->unit->unit_name ?? 'this unit' }}</span> as inactive and set the end date to today. Please confirm.</p>
                    </div>
                </div>
       
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button
                        type="button"
                        @click="if (!$wire.__instance.loading) inactiveOpen = false"
                        wire:loading.attr="disabled"
                        wire:target="setInactive"
                        class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 disabled:opacity-50 disabled:cursor-not-allowed hover:bg-gray-100 transition-colors">
                        Cancel
                    </button>
                    <x-loading-livewire-button wireTarget="setInactive" formId="SetInactiveForm-{{ $assignment->id }}" class="w-1/1 text-center flex justify-center items-center bg-orange-500 hover:bg-orange-400 text-white">
                        <x-heroicon-s-minus-circle class="w-4 h-4 mr-1" />
                        {{ __('Set Inactive') }}
                    </x-loading-livewire-button>
                </div>
            </form>
        </div>
    </div>
</div>