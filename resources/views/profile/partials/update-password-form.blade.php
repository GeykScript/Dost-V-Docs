<section>
    <header class="flex gap-2 items-center ">
        <x-heroicon-o-adjustments-horizontal class="w-5 h-5 text-gray-800" />

        <h2 class="text-lg font-semibold text-gray-700">
            {{ __('Account Settings') }}

        </h2>
    </header>

      <!-- session status  -->
       <!-- session status  -->
        @php
            $messages = [
                'password-updated' => 'Password Updated Successfully.',
                'no-changes-password' => 'No changes were made to the password.',
            ];
            $status = session('status');
        @endphp

        @if ($status && isset($messages[$status]))
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 3000)"
                class="text-sm text-green-500 bg-green-100 p-3 rounded-lg mt-2"
            >
                {{ __($messages[$status]) }}
            </p>
        @endif

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

      

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-password-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-password-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-password-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="capitalize">{{ __('Update Password') }}</x-primary-button>
        </div>
    </form>
</section>
