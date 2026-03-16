<div x-data="{ open: false }"  class="col-span-2 md:col-span-2 flex items-center justify-center">

    <!-- Delete  Button -->
    <button 
            type="button"
            @click="open = true"
            class="bg-red-500 text-white px-3 py-2 rounded-md text-sm flex items-center gap-1">
            <x-heroicon-s-trash class="w-4 h-4" />Delete
        </button>

    <!-- Modal Wrapper -->
    <div
        x-cloak
        x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
        @keydown.escape.window="open = false">

        <!-- Backdrop -->
        <div
            x-show="open"
            x-transition.opacity
            class="absolute inset-0 bg-black/50"
            @click="open = false">
        </div>

        <!-- Modal Panel -->
        <div
            x-show="open"
            x-transition.scale
            class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-xl overflow-hidden">

         
            <!-- Form -->
            <form wire:submit.prevent="deleteUnit" class="px-7 py-6 space-y-4" id="DeleteUnitForm">
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
                        @click="open = false"
                        class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 ">
                        Cancel
                    </button>
                    <x-loading-button formId="DeleteUnitForm" class="w-1/1  text-center flex justify-center  items-center bg-red-500 hover:bg-red-400">
                        <x-heroicon-s-trash class="w-4 h-4 mr-1"/>
                            {{ __('Delete Unit') }}
                        </x-loading-button>
                </div>
            </form>
        </div>
    </div>
</div>
