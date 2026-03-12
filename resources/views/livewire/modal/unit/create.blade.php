<div x-data="{ open: false }" class="col-span-2 md:col-span-2 flex items-center justify-center">

    <!-- Add Unit Button -->
    <button
        type="button"
        @click="open = true"
        class="bg-brand-blue text-white text-sm md:text-md h-full w-full rounded-lg flex items-center justify-center gap-2 font-semibold">
        <x-heroicon-s-plus class="w-4 h-4 hidden sm:block"/>
        Add Unit
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

                <button
                    type="button"
                    @click="open = false"
                    class="text-gray-400 hover:text-gray-600">
                    <x-heroicon-s-x-mark class="w-5 h-5" />
                </button>
            </div>

            <!-- Form -->
             <!-- wire:submit.prevent="save" -->
            <form  class="px-7 py-6 space-y-4">


                <div class="grid grid-cols-12 gap-2">
                     <div class="col-span-7">
                    <label class="block text-xs font-bold text-gray-500 mb-1">
                        Unit Name
                    </label>

                    <x-text-input
                        type="text"
                        wire:model.defer="unit_name"
                        class="w-full text-sm border border-gray-300 rounded-lg placeholder:text-gray-400 px-3 py-2.5 focus:ring-1 focus:ring-sky-500"
                        placeholder="e.g Management Information Systems"/>
                </div>

                <div class="col-span-5">
                    <label class="block text-xs font-bold text-gray-500 mb-1">
                        Abbreviation
                    </label>

                    <x-text-input
                        type="text"
                        wire:model.defer="abbreviation"
                        class="w-full text-sm border border-gray-300 rounded-lg placeholder:text-gray-400 px-3 py-2.5 focus:ring-1 focus:ring-sky-500"
                        placeholder="e.g MIS"/>
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
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-2 pt-2">

                    <button
                        type="button"
                        @click="open = false"
                        class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 ">
                        Cancel
                    </button>

                    <button
                        type="submit"
                        @click="open = false"
                        wire:loading.attr="disabled"
                        class="px-8 py-2 rounded-lg text-sm font-semibold bg-brand-blue hover:bg-sky-400 text-white">
                        <span wire:loading.remove>Create</span>
                        <span wire:loading>Creating...</span>
                    </button>

                </div>

            </form>
        </div>
    </div>
</div>