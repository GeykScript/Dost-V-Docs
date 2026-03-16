<section>
    <header class="flex gap-2 items-center ">
        <x-heroicon-o-identification class="w-5 h-5 text-gray-800" />

        <h2 class="text-lg font-semibold text-gray-700">
            {{ __('Profile Information') }}

        </h2>
    
    </header>
        <!-- session status  -->
        @php
            $messages = [
                'profile-updated' => 'Profile Details Updated Successfully.',
                'no-changes-profile' => 'No changes were made to the profile details.',
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

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6" id="UpdateProfileForm">
        @csrf
        @method('patch')


        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" :value="old('username', $user->username)" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" />
        </div>


        <div class="grid grid-cols-12 gap-2">
        <div class="col-span-12 md:col-span-5">
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required  autocomplete="name" />
            <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('first_name')" />
        </div>
        <div class="col-span-12 md:col-span-5">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required  autocomplete="name" />
            <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('last_name')" />
        </div>
        <div class="col-span-12 md:col-span-2">
            <x-input-label for="suffix" :value="__('Suffix')" />
            <x-text-input id="suffix" name="suffix" type="text" class="mt-1 block w-full" :value="old('suffix', $user->suffix)"  autocomplete="name" />
            <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('suffix')" />
        </div>

        <div class="col-span-12 mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        
        </div>
        <!-- save changes button  -->
        <div class="flex items-center justify-end gap-4">
                    <x-loading-button formId="UpdateProfileForm" class="capitalize">{{ __('Save Changes') }}</x-loading-button>      
        </div>

    </form>
</section>
