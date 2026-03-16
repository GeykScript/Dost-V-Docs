<x-app-layout>
@section('title', 'Add Account')

<!-- Account Add Page  -->
<div class="min-h-screen w-full p-4 sm:p-6">

        <div class="w-full gap-3">
            <div class=" bg-white shadow-sm rounded-lg flex flex-col">
               <section class="p-10">
                <div class="flex flex-col gap-5">
                    <div class="flex flex-col">
                        <h1 class="text-2xl text-brand-blue font-bold">Create New Account</h1>
                        <p class="text-gray-600 text-xs">Please fill all required fields.</p>
                    </div>
                    <div class="flex gap-2 items-center ">
                        <x-heroicon-o-identification class="w-6 h-6 text-gray-800" />
                        <h2 class=" text-md text-gray-600 font-bold">
                            {{ __('Profile Information') }}
                        </h2>
                    </div>
                </div>
              
                    <form method="post" action="#" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div class="grid grid-cols-12 gap-5">

                            <div class="col-span-12 md:col-span-6"> 
                                <label for="username" class="block font-medium text-sm text-gray-700">Username<span class="text-red-600"> *</span></label>
                                <x-text-input id="username" name="username" type="text"   class="mt-1 block w-full" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('username')" class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" />
                            </div>

                            <div class="col-span-12 md:col-span-6">
                                <label for="email" class="block font-medium text-sm text-gray-700">Email<span class="text-red-600"> *</span></label>
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"  required autocomplete="username" />
                                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('email')" />
                            </div>

                            <div class="col-span-12 md:col-span-5">
                                <label for="first_name" class="block font-medium text-sm text-gray-700">First Name<span class="text-red-600"> *</span></label>
                                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"  required  autocomplete="name" />
                                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('first_name')" />
                            </div>
                            <div class="col-span-12 md:col-span-5">
                                <label for="last_name" class="block font-medium text-sm text-gray-700">Last Name<span class="text-red-600"> *</span></label>
                                <x-text-input id="last_name" name="last_name" type="text"  class="mt-1 block w-full"  required  autocomplete="name" />
                                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('last_name')" />
                            </div>
                            <div class="col-span-12 md:col-span-2">
                                <label for="suffix" class="block font-medium text-sm text-gray-700">Suffix</label>
                                <x-text-input id="suffix" name="suffix" type="text" class="mt-1 block w-full"   autocomplete="name" />
                                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('suffix')" />
                            </div>
                        </div>
                        <!--  button  -->
                        <div class="flex items-center justify-end gap-4">
                            <div class="flex justify-between items-center gap-5">
                                <a href="{{ route('accounts') }}" class="text-sm font-semibold text-gray-400 hover:text-gray-500">{{ __('Cancel') }}</a>
                                <x-primary-button class="capitalize bg-sky-500 hover:bg-sky-400 text-white">{{ __('Create New Account') }}</x-primary-button>      
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
        <footer class="text-xs text-gray-600  text-center p-4">
        © 2026 All rights reserved | Developed by Department of Science and Technology - Regional Office V - Management Information Services Unit
    </footer>
</div>


</x-app-layout>