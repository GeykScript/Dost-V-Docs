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
    <!-- Reset Password Button with Modal -->
    <!-- resources\views\livewire\modal\account\password-reset-account.blade.php -->
    <livewire:modal.account.password-reset-account :user="$user" />
</div>


<!-- Hide Content to Admin Own Account -->
@if (!$ownAdminAccount)

     <!-- If user is ACTIVE show Disable  -->
    @if(!$user->trashed())
        <div class="grid grid-cols-12 gap-2 bg-red-50 border border-red-500 shadow-md rounded-lg p-4">
            <div class="col-span-12 md:col-span-1 flex items-center justify-center">
                <div class="bg-red-500/10 p-2 rounded-full">
                    <x-heroicon-o-exclamation-circle class="w-6 h-6 text-red-500" />
                </div>
            </div>

            <div class="col-span-12 md:col-span-8 flex flex-col px-2">
                <h1 class="font-bold">Disable Account</h1>
                <p class="text-xs">Disabling this account will restrict the user from accessing the system.</p>
            </div>
            <!-- Disable Button with Modal  -->
            <!-- resources\views\livewire\modal\account\disable-account.blade.php -->
            <livewire:modal.account.disable-account :user="$user" />
        </div>
    @else
        <!-- If user is TRASHED  show Restore  -->
        <div class="grid grid-cols-12 gap-2 bg-green-50 border border-green-500 shadow-md rounded-lg p-4">
            <div class="col-span-12 md:col-span-1 flex items-center justify-center">
                <div class="bg-green-500/10 p-2 rounded-full">
                    <x-heroicon-o-arrow-path class="w-6 h-6 text-green-500" />
                </div>
            </div>

            <div class="col-span-12 md:col-span-8 flex flex-col px-2">
                <h1 class="font-bold">Restore Account</h1>
                <p class="text-xs">Restoring this account will allow the user to access the system again.</p>
            </div>
                <!-- Restore Button with Modal  -->
                <!-- resources\views\livewire\modal\account\restore-account.blade.php -->
            <livewire:modal.account.restore-account :user="$user" />
        </div>
    @endif



@endif