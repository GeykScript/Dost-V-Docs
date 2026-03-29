<div x-data="{ createUnitOpen: false }"  class="col-span-2 md:col-span-2 flex items-center justify-center">

    <!-- Add Unit Button -->
    <button
        type="button"
        @click="createUnitOpen = true"
        class="bg-brand-blue text-white text-sm md:text-md h-full w-full rounded-lg flex items-center justify-center gap-2 font-semibold">
        <x-heroicon-s-plus class="w-4 h-4 hidden sm:block"/>
        Add Unit
    </button>

    <!-- Modal Wrapper -->
    <div
        x-cloak
        x-show="createUnitOpen"
        x-on:close-create-modal.window="createUnitOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
        @keydown.escape.window="createUnitOpen = false">

        <!-- Backdrop -->
        <div
            x-show="createUnitOpen"
            x-transition.opacity
            class="absolute inset-0 bg-black/50">
        </div>

        <!-- Modal Panel -->
        <div
            x-show="createUnitOpen"
            x-transition.scale
            class="relative z-10 w-full max-w-xl bg-white rounded-xl shadow-xl overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-7 py-6 border-b">
                <div class="flex items-center gap-1.5">
                    <div class="bg-gray-100 p-2 rounded-lg">
                        <x-heroicon-s-tag class="w-5 h-5 text-gray-600" />
                    </div>
                    <div>
                        <h1 class="text-md font-bold text-gray-700 leading-none">Add Unit</h1>
                            <p class="text-xs text-gray-400 leading-none">Please fill in all required fields.</p>
                    </div>
                </div> 

            </div>

            <!-- Form -->
            <form wire:submit.prevent="createUnit" class="px-7 py-6 space-y-4" id="CreateUnitForm">
                <div class="grid grid-cols-12 gap-2">
                     <div class="col-span-12 md:col-span-7">
                    <label class="block text-xs font-bold text-gray-500 mb-1">
                        Unit Name <span class="text-red-500">*</span>
                    </label>

                    <x-text-input
                        type="text"
                        wire:model.defer="unit_name"
                        class="w-full text-sm border border-gray-300 rounded-lg placeholder:text-gray-400 px-3 py-2.5 focus:ring-1 focus:ring-sky-500"
                        placeholder="e.g Management Information Systems"/>
                    @error('unit_name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-12 md:col-span-5">
                    <label class="block text-xs font-bold text-gray-500 mb-1">
                        Abbreviation <span class="text-red-500">*</span>
                    </label>

                    <x-text-input
                        type="text"
                        wire:model.defer="abbreviation"
                        class="w-full text-sm border border-gray-300 rounded-lg placeholder:text-gray-400 px-3 py-2.5 focus:ring-1 focus:ring-sky-500"
                        placeholder="e.g MIS"/>
                    @error('abbreviation')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1">
                        Description
                    </label>

                    <textarea
                        rows="3"
                        wire:model.defer="description"
                        class="w-full text-sm border border-gray-300 rounded-lg placeholder:text-gray-400 px-3 py-2.5 focus:border focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        placeholder="Short description..."></textarea>
                    @error('description')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-2 pt-2">
                        <button
                                type="button"
                                @click="if (!$wire.__instance.loading) createUnitOpen = false"
                                wire:loading.attr="disabled"
                                wire:target="createUnit"
                                class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                Cancel
                        </button>
                        <x-loading-livewire-button wireTarget="createUnit" wire:loading.attr="disabled" formId="CreateUnitForm" class="w-1/1 md:w-1/3 text-center flex justify-center  items-center bg-sky-500 hover:bg-sky-400">
                            <x-heroicon-s-plus class="w-4 h-4 mr-1" />
                                {{ __('Create Unit') }}
                        </x-loading-livewire-button>
                    </div>
            </form>
        </div>
    </div>
</div>
