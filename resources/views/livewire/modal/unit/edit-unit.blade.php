
<div x-data="{ editUnitOpen: false, deleteUnitOpen: false }"   class="col-span-2 md:col-span-2 flex items-center justify-center">
    <!-- button showing in the table row to open the edit modal -->
        <button 
            type="button"
            @click="editUnitOpen = true"
            class="bg-white text-sky-500 border border-sky-500 hover:bg-sky-50   px-3 py-2 rounded-md text-sm flex items-center gap-1">
            <x-heroicon-s-pencil-square class="w-4 h-4" />Edit
        </button>

    <!-- Edit Modal Wrapper -->
    <div
        x-cloak
        x-show="editUnitOpen"
        x-on:close-edit-modal.window="editUnitOpen = false"

        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
        @keydown.escape.window="editUnitOpen = false">

        <!-- Backdrop -->
        <div
            x-show="editUnitOpen"
            x-transition.opacity
            class="absolute inset-0 bg-black/50">
        </div>

        <!-- Modal Panel -->
        <div
            x-show="editUnitOpen"
            x-transition.scale
            class="relative z-10 w-full max-w-xl bg-white rounded-xl shadow-xl overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-7 py-6 border-b">
                <div class="flex items-center gap-1.5">
                    <div class="bg-gray-100 p-2 rounded-lg">
                        <x-heroicon-s-tag class="w-5 h-5 text-gray-600" />
                    </div>
                    <div>
                        <h1 class="text-md font-bold text-gray-700 leading-none">Edit Unit</h1>
                            <p class="text-xs text-gray-400 leading-none">Please fill in all required fields.</p>
                    </div>
                </div> 

           
            </div>

            <!-- Form -->
                <form wire:submit.prevent="editUnit" class="px-7 py-6 space-y-4" id="EditUnitForm">
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12 md:col-span-9">
                            <label class="block text-xs font-bold text-gray-500 mb-1">Unit Name</label>
                            <x-text-input
                                type="text"
                                wire:model.defer="unit_name"
                                class="w-full text-sm border border-gray-300 rounded-lg placeholder:text-gray-400 px-3 py-2.5 focus:ring-1 focus:ring-sky-500"
                                placeholder="e.g Management Information Systems"/>
                            @error('unit_name')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-12 md:col-span-3">
                            <label class="block text-xs font-bold text-gray-500 mb-1">
                                Abbreviation
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

                        <!-- Delete inside Edit Modal -->
                        <div class="grid grid-cols-12 gap-2 bg-red-50 border border-red-500 shadow-md rounded-lg p-4 ">
                            <div class="col-span-12 md:col-span-1 flex items-start md:items-center justofy-start md:justify-center">
                                <!-- Icon with background -->
                                <div class="bg-red-500/10 p-2 rounded-full flex items-center justify-center">
                                    <x-heroicon-o-exclamation-circle class="w-6 h-6 text-red-500" />
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-8 flex flex-col px-2">
                                <h1 class="font-bold ">Unit Deletion</h1>
                                <p class="text-xs">Deleting this unit will remove it from the system. Please confirm your decision.</p>
                            </div>
                            <div class="col-span-12 md:col-span-3 flex items-start md:items-center justify-start md:justify-center">
                                <button
                                    type="button"
                                    @click="editUnitOpen = false; deleteUnitOpen = true"
                                    wire:loading.attr="disabled"
                                    class="px-4 py-2 rounded-lg text-xs font-semibold  text-white bg-red-500 hover:bg-red-400 shadow-lg flex items-center gap-1">
                                    <x-heroicon-s-trash class="w-3 h-3"/> Delete
                                </button>
                            </div>
                        </div>



                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-2 pt-2">
                        <button
                                type="button"
                                @click="if (!$wire.__instance.loading) editUnitOpen = false"
                                wire:loading.attr="disabled"
                                wire:target="editUnit"
                                class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                Cancel
                        </button>
                        <x-loading-livewire-button wireTarget="editUnit" wire:loading.attr="disabled" formId="EditUnitForm" class="w-1/1  text-center flex justify-center  items-center bg-sky-500 hover:bg-sky-400">
                            <x-heroicon-s-pencil-square class="w-4 h-4 mr-1 hidden sm:block" />
                                {{ __('Save Changes') }}
                        </x-loading-livewire-button>
                    </div>
            </form> 
        </div>
    </div>
    <!-- end of Edit modal Wrapper  -->


    <!--Delete Modal Wrapper -->
    <div
        x-cloak
        x-show="deleteUnitOpen"
        x-on:close-delete-modal.window="deleteUnitOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
        @keydown.escape.window="deleteUnitOpen = false">

        <!-- Backdrop -->
        <div
            x-show="deleteUnitOpen"
            x-transition.opacity
            class="absolute inset-0 bg-black/50">
        </div>

        <!-- Modal Panel -->
        <div
            x-show="deleteUnitOpen"
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
                                @click="if (!$wire.__instance.loading) deleteUnitOpen = false"
                                wire:loading.attr="disabled"
                                wire:target="deleteUnit"
                                class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                Cancel
                        </button>
                        <x-loading-livewire-button wireTarget="deleteUnit" wire:loading.attr="disabled" formId="DeleteUnitForm" class="w-1/1  text-center flex justify-center  items-center bg-red-500 hover:bg-red-400">
                            <x-heroicon-s-trash class="w-4 h-4 mr-1"/>
                                {{ __('Delete Unit') }}
                        </x-loading-livewire-button>
                </div>
            </form>
        </div>
    </div>
    <!-- end of Delete modal Wrapper  -->
</div>



