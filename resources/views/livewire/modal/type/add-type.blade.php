<div x-data="{ typeCreateOpen: false }"  class="col-span-2 md:col-span-2 flex items-center justify-center">

    <!-- Add Unit Button -->
    <button
        type="button"
        @click="typeCreateOpen = true"
        class="bg-brand-blue text-white text-sm md:text-md h-full w-full rounded-lg flex items-center justify-center gap-2 font-semibold">
        <x-heroicon-s-plus class="w-4 h-4 hidden sm:block"/>
        Add Type
    </button>

    <!-- Modal Wrapper -->
    <div
        x-cloak
        x-show="typeCreateOpen"
        x-on:close-create-modal.window="typeCreateOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
        @keydown.escape.window="typeCreateOpen = false">

        <!-- Backdrop -->
        <div
            x-show="typeCreateOpen"
            x-transition.opacity
            class="absolute inset-0 bg-black/50">
        </div>

        <!-- Modal Panel -->
        <div
            x-show="typeCreateOpen"
            x-transition.scale
            class="relative z-10 w-full max-w-xl bg-white rounded-xl shadow-xl overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-7 py-6 border-b">
                <div class="flex items-center gap-1.5">
                    <div class="bg-gray-100 p-2 rounded-lg">
                        <x-heroicon-o-document-duplicate class="w-5 h-5 text-gray-600" />
                    </div>
                    <div>
                        <h1 class="text-md font-bold text-gray-700 leading-none">Add Document Type</h1>
                            <p class="text-xs text-gray-400 leading-none">Please fill in all required fields.</p>
                    </div>
                </div> 

               
            </div>

            <!-- Form -->
            <form wire:submit.prevent="addType" class="px-7 py-6 space-y-4" id="AddTypeForm">
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12">
                        <label class="block text-xs font-bold text-gray-500 mb-1">
                            Type Name <span class="text-red-500">*</span>
                        </label>

                        <x-text-input
                            type="text"
                            wire:model.defer="type_name"
                            class="w-full text-sm border border-gray-300 rounded-lg placeholder:text-gray-400 px-3 py-2.5 focus:ring-1 focus:ring-sky-500"
                            placeholder="e.g For signature"/>
                        @error('type_name')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-2 pt-2">
                        <button
                                type="button"
                                @click="if (!$wire.__instance.loading) typeCreateOpen = false"
                                wire:loading.attr="disabled"
                                wire:target="addType"
                                class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                Cancel
                        </button>
                        <x-loading-livewire-button wireTarget="addType" wire:loading.attr="disabled" formId="AddTypeForm" class="w-1/1 md:w-1/3 text-center flex justify-center  items-center bg-sky-500 hover:bg-sky-400">
                            <x-heroicon-s-plus class="w-4 h-4 mr-1" />
                                {{ __('Add Type') }}
                        </x-loading-livewire-button>
                    </div>
            </form>
        </div>
    </div>
</div>
