<div x-data="{ deleteTypeOpen: false }"  class="col-span-2 md:col-span-2 flex items-center justify-center">

    <!-- Delete  Button -->
    <button 
            type="button"
            @click="deleteTypeOpen = true"
            class="bg-white text-red-500 border border-red-500 hover:bg-red-50 px-3 py-2 rounded-md text-sm flex items-center gap-1">
            <x-heroicon-s-trash class="w-4 h-4" />Delete
        </button>

    <!-- Modal Wrapper -->
    <div
        x-cloak
        x-show="deleteTypeOpen"
        x-on:close-delete-modal.window="deleteTypeOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
        @keydown.escape.window="deleteTypeOpen = false">

        <!-- Backdrop -->
        <div
            x-show="deleteTypeOpen"
            x-transition.opacity
            class="absolute inset-0 bg-black/50">
        </div>

        <!-- Modal Panel -->
        <div
            x-show="deleteTypeOpen"
            x-transition.scale
            class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-xl overflow-hidden">

         
            <!-- Form -->
            <form wire:submit.prevent="deleteType" class="px-7 py-6 space-y-4" id="DeleteTypeForm">
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12 flex flex-col items-center justify-center">
                        <div class="flex p-4 items-center justify-center rounded-full w-20 h-20  bg-red-500 ">
                            <x-heroicon-s-exclamation-triangle class="text-2xl text-white " />
                        </div>
                        <h1 class="text-center text-xl font-bold text-gray-700 mt-4 mb-2">Are you sure you want to delete?</h1>
                        <p class="text-center text-xs text-gray-500">This action cannot be undone. Please confirm your decision.</p>
                    </div>
                </div>
                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-2 pt-2">
                        <button
                                type="button"
                                @click="if (!$wire.__instance.loading) deleteTypeOpen = false"
                                wire:loading.attr="disabled"
                                wire:target="deleteType"
                                class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                Cancel
                        </button>
                        <x-loading-livewire-button wireTarget="deleteType" formId="DeleteTypeForm" class="w-1/1  text-center flex justify-center  items-center bg-red-500 hover:bg-red-400">
                            <x-heroicon-s-trash class="w-4 h-4 mr-1" />
                                {{ __('Delete Type') }}
                        </x-loading-livewire-button>
                    </div>
            </form>
        </div>
    </div>
</div>
