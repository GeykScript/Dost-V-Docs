<x-guest-layout>

    <div class="flex flex-col px-6 md:px-12">
        <div class="flex justify-center items-center mt-10">
            <div class="flex">
                <img src="{{ asset ('logo/docs_logo.png')}}" alt="DOCS Logo" class="w-auto h-16 md:h-20">
                <div class="flex flex-col justify-center ">
                    <h1 class="text-2xl text-brand-blue font-black italic leading-tight tracking-tight"> <span class="text-brand-dark-blue">D</span>OCS</h1>
                    <h3 class="font-semibold text-gray-800 text-[9px] md:text-sm"><span class="text-brand-dark-blue font-semibold">DOCUMENT</span> OPERATION COMMUNICATION SYSTEM</h3>
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center my-6">
            <h1 class="font-semibold  text-brand-blue text-md md:text-lg" >Login Account</h1>
        </div>

            <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- error message for failed login attempt -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 text-sm rounded mb-3">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- form to login  -->
        <form method="POST" action="{{ route('login') }}" >
            @csrf


        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" class="text-gray-800" />

            <x-text-input 
                id="username" 
                class="block mt-1 w-full h-10 md:h-12"
                type="text"
                name="username"
                :value="old('username')"
                required
                autofocus
                autocomplete="username"
            />
            <!-- <x-input-error :messages="$errors->get('username')" class="mt-2 bg-red-100 text-red-600 p-2 rounded" /> -->
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full h-10 md:h-12"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <!-- <x-input-error :messages="$errors->get('password')" class="mt-2 bg-red-100 text-red-600 p-2 rounded" /> -->
        </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-brand-blue shadow-sm focus:brand-blue focus:ring-2 focus:ring-brand-blue" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex mt-6">
                <x-primary-button class="w-full text-center flex justify-center mb-12 h-10 md:h-12 items-center bg-gray-800">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    

</x-guest-layout>
