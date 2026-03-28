<div 
    x-data="{ restoreAccountOpen: false, confirmed: false }"  
    class="col-span-12 md:col-span-3 flex items-start md:items-center justify-start md:justify-center"
>
    <!-- Trigger Button -->
    <button
        type="button"
        @click="restoreAccountOpen = true"
        class="px-4 py-2 rounded-lg text-xs font-semibold text-white bg-green-500 hover:bg-green-400 shadow-lg flex items-center gap-1">
        <x-heroicon-s-arrow-path class="w-3 h-3"/> Restore
    </button>

    <!-- Modal Wrapper -->
    <div
        x-cloak
        x-show="restoreAccountOpen"
        x-on:close-restore-modal.window="restoreAccountOpen = false"
        @keydown.escape.window="restoreAccountOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
    >

        <!-- Backdrop -->
        <div
            @click="restoreAccountOpen = false"
            x-show="restoreAccountOpen"
            x-transition.opacity
            class="absolute inset-0 bg-black/50">
        </div>

        <!-- Modal Panel -->
        <div
            x-show="restoreAccountOpen"
            x-transition.scale
            @click.stop
            class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-xl overflow-hidden"
        >

            <!-- Form -->
            <form wire:submit.prevent="restoreAccount" class="px-7 py-6 space-y-4" id="RestoreAccountForm">

                <!-- Icon + Text -->
                <div class="flex flex-col items-center justify-center text-center">
                    <div class="flex p-4 items-center justify-center rounded-full w-20 h-20 bg-green-500">
                        <x-heroicon-s-arrow-path class="text-white w-10 h-10" />
                    </div>

                    <h1 class="text-xl font-bold text-gray-700 mt-4 mb-2">
                        Are you sure you want to restore this account?
                    </h1>

                    <p class="text-xs text-gray-500">
                        This action cannot be undone. Please confirm your decision.
                    </p>
                </div>

                <!-- Confirmation -->
                <div class="w-full mt-4 p-4 bg-gray-50 rounded-lg border flex items-center justify-center gap-3">
                    <input 
                        type="checkbox" 
                        x-model="confirmed"
                        id="confirmRestoreCheckbox"
                        class="w-4 h-4 text-green-500 border-gray-300 rounded focus:ring-green-500 cursor-pointer"
                    >
                    <label for="confirmRestoreCheckbox" class="text-sm font-medium text-gray-600 cursor-pointer">
                        I have reviewed the details.
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-2 pt-2">

                    <!-- Cancel -->
                    <button
                        type="button"
                        @click="restoreAccountOpen = false"
                        wire:loading.attr="disabled"
                        class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-500 hover:text-gray-700">
                        Cancel
                    </button>

                    <!-- Submit -->
                    <x-loading-livewire-button
                        type="submit"
                        wireTarget="restoreAccount"
                        x-bind:disabled="!confirmed"
                        x-bind:class="!confirmed ? 'opacity-50 cursor-not-allowed' : ''"
                        wire:loading.attr="disabled"
                        formId="RestoreAccountForm"
                        class="flex items-center justify-center bg-green-500 hover:bg-green-400 px-4 py-2 rounded-lg text-white text-sm font-semibold"
                    >
                        <x-heroicon-s-arrow-path class="w-4 h-4 mr-1" />
                        {{ __('Restore Account') }}
                    </x-loading-livewire-button>

                </div>
            </form>
        </div>
    </div>
</div>