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

    <form method="POST" action="{{ route('login') }}" >
        @csrf
        <!-- Email Address -->
     <div>
    <!-- ACCOUNT ID -->
    <x-input-label for="account_id" :value="__('Account ID')" class="text-gray-800" />

    <x-text-input 
        id="account_id" 
        class="block mt-1 w-full h-10 md:h-12"
        type="text"
        name="account_id"
        :value="old('account_id')"
        required
        autofocus
        autocomplete="username"
    />

    <x-input-error :messages="$errors->get('account_id')" class="mt-2" />
</div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full h-10 md:h-12"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex mt-6">
            <!-- @if (Route::has('password.request'))
            
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif -->

            <x-primary-button class="w-full text-center flex justify-center mb-12 h-10 md:h-12 items-center bg-gray-800">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    

</x-guest-layout>
