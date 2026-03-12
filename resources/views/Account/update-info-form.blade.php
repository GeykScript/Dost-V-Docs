<section class="p-10">
    <header class="flex gap-2 items-center ">
        <x-heroicon-o-identification class="w-6 h-6 text-gray-800" />

        <h2 class=" text-xl text-gray-600 font-bold">
            {{ __('Profile Information') }}

        </h2>
    
    </header>
        <!-- session status  -->
        @php
            $messages = [
                'user-profile-updated' => 'Profile Details Updated Successfully.',
                'user-no-changes-profile' => 'No changes were made to the profile details.',
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


    <form method="post" action="#" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-12 gap-5">

            <div class="col-span-12 md:col-span-6"> 
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" name="username" type="text" :value="old('username', $user->username)"  class="mt-1 block w-full" required autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" />
            </div>

            <div class="col-span-12 md:col-span-6">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" class="mt-1 block w-full"  required autocomplete="username" />
                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('email')" />
            </div>

            <div class="col-span-12 md:col-span-5">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" type="text" :value="old('first_name', $user->first_name)" class="mt-1 block w-full"  required  autocomplete="name" />
                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('first_name')" />
            </div>
            <div class="col-span-12 md:col-span-5">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" type="text" :value="old('last_name', $user->last_name)" class="mt-1 block w-full"  required  autocomplete="name" />
                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('last_name')" />
            </div>
            <div class="col-span-12 md:col-span-2">
                <x-input-label for="suffix" :value="__('Suffix')" />
                <x-text-input id="suffix" name="suffix" type="text" :value="old('suffix', $user->suffix)" class="mt-1 block w-full"   autocomplete="name" />
                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('suffix')" />
            </div>
        </div>
        <!-- save changes button  -->
        <div class="flex items-center justify-end gap-4">
                    <x-primary-button class="capitalize bg-sky-500 hover:bg-sky-400 text-white">{{ __('Save Changes') }}</x-primary-button>      
        </div>

    </form>
</section>
