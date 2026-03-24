<x-app-layout>
@section('title', 'Add Account')
    <x-alert-message :successMessage="session('success')" :errorMessage="session('error')" />

<!-- Account Add Page  -->
<div class="min-h-screen w-full p-4 sm:p-6">

        <div class="w-full gap-3">
            <div class=" bg-white shadow-sm rounded-lg flex flex-col">
            <section class="p-4 md:p-10">
                    <form method="post" action="#" >
                        @csrf
                        @method('patch')
                    
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12">
                                <div class="flex flex-col gap-5">
                                    <div class="flex flex-col">
                                        <h1 class="text-2xl text-brand-blue font-bold">Create New Account</h1>
                                        <p class="text-gray-600 text-xs">Please fill all required fields.</p>
                                    </div>
                                    <div class="flex gap-2 items-center ">
                                        <x-heroicon-o-identification class="w-6 h-6 text-gray-700" />
                                        <h2 class=" text-md text-gray-600 font-bold">
                                            {{ __('Profile Information') }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Username -->
                            <div class="col-span-12 md:col-span-6 "> 
                                <label for="username" class="block font-medium text-sm text-gray-700">Username<span class="text-red-600"> *</span></label>
                                <x-text-input id="username" name="username" type="text"   class="mt-1 block w-full" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('username')" class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" />
                            </div>
                            <!-- Email -->
                            <div class="col-span-12 md:col-span-6">
                                <label for="email" class="block font-medium text-sm text-gray-700">Email<span class="text-red-600"> *</span></label>
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"  required autocomplete="username" />
                                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('email')" />
                            </div>
                            <!-- First Name  -->
                            <div class="col-span-12 md:col-span-5">
                                <label for="first_name" class="block font-medium text-sm text-gray-700">First Name<span class="text-red-600"> *</span></label>
                                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"  required  autocomplete="name" />
                                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('first_name')" />
                            </div>
                            <!-- Last Name  -->
                            <div class="col-span-12 md:col-span-5">
                                <label for="last_name" class="block font-medium text-sm text-gray-700">Last Name<span class="text-red-600"> *</span></label>
                                <x-text-input id="last_name" name="last_name" type="text"  class="mt-1 block w-full"  required  autocomplete="name" />
                                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('last_name')" />
                            </div>
                            <!-- Suffix  -->
                            <div class="col-span-12 md:col-span-2">
                                <label for="suffix" class="block font-medium text-sm text-gray-700">Suffix</label>
                                <x-text-input id="suffix" name="suffix" type="text" class="mt-1 block w-full"   autocomplete="name" />
                                <x-input-error class="mt-2 text-xs bg-red-100 text-red-600 p-4 rounded" :messages="$errors->get('suffix')" />
                            </div>

                            <!-- Unit and Position Selection -->
                            <div class="col-span-12 grid grid-cols-12 gap-6">
                                <div class="col-span-12 flex gap-2 items-center ">
                                    <x-heroicon-o-user class="w-5 h-5 text-gray-700" />
                                    <h2 class=" text-md text-gray-600 font-bold">
                                        {{ __('Account Management') }}
                                    </h2>
                                </div>
                                <div class="col-span-12 md:col-span-7 flex flex-col gap-4">
                                    <!-- Unit Dropdown  -->
                                    <div class="flex flex-col">
                                        <label class="block mb-2 text-sm font-medium text-gray-600">
                                            Unit <span class="text-red-500">*</span>
                                        </label>
                                        <div 
                                            x-data="{ open: false, selected: 'Select Unit', selectedId: '' }" 
                                            class="relative w-full">
                                            <!-- Trigger -->
                                            <button 
                                                type="button"
                                                @click="open = !open"
                                                class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outline-none p-2.5 hover:bg-gray-50 transition-colors">
                                                <span x-text="selected"></span>
                                                <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                                            </button>

                                            <!-- Dropdown -->
                                            <div 
                                                x-show="open"
                                                @click.outside="open = false"
                                                x-transition
                                                class="absolute z-10 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                                                @foreach($units as $unit)
                                                    <button 
                                                        type="button"
                                                        @click="
                                                            selected = '{{ $unit->unit_name }}';
                                                            selectedId = '{{ $unit->id }}';
                                                            open = false;
                                                        "
                                                        class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                                                    >
                                                        {{ $unit->unit_name }}
                                                    </button>
                                                @endforeach
                                            </div>
                                            <!-- Hidden input - Unit ID Passing -->
                                            <input type="hidden" name="unit_id" :value="selectedId">
                                        </div>                                        
                                    </div>
                                    <!-- Position Dropdown -->
                                    <div class="flex flex-col">
                                        <label class="block mb-2 text-sm font-medium text-gray-600">
                                            Position <span class="text-red-500">*</span>
                                        </label>
                                        <div 
                                            x-data="{ open: false, selected: 'Select Position', selectedValue: '' }" 
                                            class="relative w-full">
                                            <!-- Trigger -->
                                            <button 
                                                type="button"
                                                @click="open = !open"
                                                class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outline-none p-2.5 hover:bg-gray-50 transition-colors">
                                                <span x-text="selected"></span>
                                                <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                                            </button>

                                            <!-- Dropdown -->
                                            <div 
                                                x-show="open"
                                                @click.outside="open = false"
                                                x-transition
                                                class="absolute z-10 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                                                <button 
                                                    type="button"
                                                    @click="selected = 'Unit Head'; selectedValue = 'Unit Head'; open = false"
                                                    class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100">
                                                    Unit Head
                                                </button>

                                                <button 
                                                    type="button"
                                                    @click="selected = 'Staff'; selectedValue = 'Staff'; open = false"
                                                    class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100">
                                                    Staff
                                                </button>
                                            </div>

                                            <!-- Hidden input - Position Name -->
                                            <input type="hidden" name="position" :value="selectedValue">
                                        </div>
                                    </div>
                                </div>
                                <!-- Is Admin Toggle -->
                                <div class="col-span-12 md:col-span-5 flex items-center justify-center">
                                    <div class=" bg-amber-50 border border-amber-200 rounded-xl p-4 space-y-4">
                                            <!-- Warning Text -->
                                            <div class="flex items-start space-x-3">
                                                <x-heroicon-s-exclamation-triangle class="w-5 h-5 text-amber-700 flex-shrink-0" />
                                                <!-- Text -->
                                                <p class="text-sm text-amber-700">
                                                    Setting this account as <span class="font-semibold">Admin</span> will grant full administrative privileges.
                                                </p>
                                            </div>

                                            <!-- Toggle Switch -->
                                            <div 
                                                x-data="{ isAdmin: false }" 
                                                class="flex items-center justify-between bg-white border border-amber-200 rounded-lg px-4 py-3"
                                            >
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">Administrator Access</p>
                                                    <p class="text-xs text-gray-500">Enable full system control</p>
                                                </div>

                                                <!-- Toggle -->
                                                <button 
                                                    type="button"
                                                    @click="isAdmin = !isAdmin"
                                                    :class="isAdmin ? 'bg-amber-600' : 'bg-gray-300'"
                                                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors"
                                                >
                                                    <span 
                                                        :class="isAdmin ? 'translate-x-6' : 'translate-x-1'"
                                                        class="inline-block h-4 w-4 transform bg-white rounded-full transition"
                                                    ></span>
                                                </button>

                                                <!-- Hidden input -->
                                                <input type="hidden" name="is_admin" :value="isAdmin ? 1 : 0">
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit BTN  -->
                            <div class="col-span-12 mt-5">
                                <div class="flex items-center justify-end gap-4">
                                    <div class="flex justify-between items-center gap-5">
                                        <a href="{{ route('accounts') }}" class="text-sm font-semibold text-gray-400 hover:text-gray-500">{{ __('Cancel') }}</a>
                                        <x-primary-button class="capitalize bg-sky-500 hover:bg-sky-400 text-white">{{ __('Create New Account') }}</x-primary-button>      
                                    </div>
                                </div>
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