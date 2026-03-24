<div class="grid grid-cols-12 gap-2 bg-amber-50 border border-amber-500 shadow-md rounded-lg p-4 mb-4">
    <div class="col-span-12 md:col-span-1 flex items-start md:items-center justify-start md:justify-center">
        <div class="bg-amber-500/10 p-2 rounded-full flex items-center justify-center">
            <x-heroicon-o-key class="w-6 h-6 text-amber-500" />
        </div>
    </div>
    <div class="col-span-12 md:col-span-8 flex flex-col px-2">
        <h1 class="font-bold">Password Reset</h1>
        <p class="text-xs">Reset the user's password to the system default.</p>
    </div>
    <div class="col-span-12 md:col-span-3 flex items-start md:items-center justify-start md:justify-center">
        <button
            type="button"
            wire:click="resetPassword"
            class="px-4 py-2 rounded-lg text-xs font-semibold text-white bg-amber-500 hover:bg-amber-400 shadow-lg flex items-center gap-1">
            <x-heroicon-s-arrow-path class="w-3 h-3"/> Reset
        </button>
    </div>
</div>

<div class="grid grid-cols-12 gap-2 bg-red-50 border border-red-500 shadow-md rounded-lg p-4">
    <div class="col-span-12 md:col-span-1 flex items-start md:items-center justify-start md:justify-center">
        <div class="bg-red-500/10 p-2 rounded-full flex items-center justify-center">
            <x-heroicon-o-exclamation-circle class="w-6 h-6 text-red-500" />
        </div>
    </div>
    <div class="col-span-12 md:col-span-8 flex flex-col px-2">
        <h1 class="font-bold">Disable Account</h1>
        <p class="text-xs">Disabling this account will restrict the user from accessing the system.</p>
    </div>
    <div class="col-span-12 md:col-span-3 flex items-start md:items-center justify-start md:justify-center">
        <button
            type="button"
            @click="editAccountOpen = false; deleteAccountOpen = true"
            class="px-4 py-2 rounded-lg text-xs font-semibold text-white bg-red-500 hover:bg-red-400 shadow-lg flex items-center gap-1">
            <x-heroicon-s-no-symbol class="w-3 h-3"/> Disable
        </button>
    </div>
</div>