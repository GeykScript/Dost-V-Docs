<div x-data="{
        openAddUserModal: false,
        confirmed: false,
        loading: false,
        errors: {},

        clearError(field) {
            delete this.errors[field];
        },

        validateForm() {
            this.errors = {};

            let username = document.getElementById('username').value.trim();
            let email = document.getElementById('email').value.trim();
            let first_name = document.getElementById('first_name').value.trim();
            let last_name = document.getElementById('last_name').value.trim();
            let suffix = document.getElementById('suffix').value.trim();
            let unit = document.querySelector('input[name=unit_id]').value.trim();
            let position = document.querySelector('input[name=position]').value.trim();

            // EMAIL REGEX
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!email) {
                this.errors.email = 'Email is required';
            } else if (!emailPattern.test(email)) {
                this.errors.email = 'Invalid email format';
            }
            // SUFFIX VALIDATION
            
            let validSuffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV', 'V'];
            if (suffix && !validSuffixes.includes(suffix)) {
                this.errors.suffix = 'Invalid suffix selected';
            }

            if (!username) this.errors.username = 'Username is required';
            if (!first_name) this.errors.first_name = 'First name is required';
            if (!last_name) this.errors.last_name = 'Last name is required';
            if (!unit) this.errors.unit = 'Please select a unit';
            if (!position) this.errors.position = 'Please select a position';

            if (Object.keys(this.errors).length === 0) {
                this.openAddUserModal = true;
            }
        }
    }">    
        <form action="{{ route('accounts.store') }}" method="POST" id="addUserAccountForm"
            @submit.prevent="
                if (confirmed) {
                    openAddUserModal = false;
                    loading = true;
                    $nextTick(() => $el.submit());
                }"
            >
            @csrf
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-5">
                            <div class="flex flex-col">
                                <h1 class="text-2xl md:text-3xl text-brand-blue font-bold">Create New Account</h1>
                                <p class="text-gray-600 text-xs">Please fill all required fields.</p>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex gap-2 items-center">
                                    <x-heroicon-o-identification class="w-6 h-6 text-gray-700" />
                                    <h2 class="text-md text-gray-600 font-bold">
                                        {{ __('Profile Information') }}
                                    </h2>
                                </div>
                                <p class="text-xs text-gray-500">
                                {{ __('Enter the user\'s basic details. Ensure the email address is active for notifications.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Input Fields  -->
                    <!-- Username  -->
                    <div class="col-span-12 md:col-span-6 ">
                        <div class="flex items-center justify-between ">
                            <label for="username" class="block font-medium text-sm text-gray-700">Username<span class="text-red-600"> *</span></label>
                            <!-- Error handling Client side  -->
                            <p x-show="errors.username" x-text="errors.username" class="text-xs font-medium text-red-500 "></p>
                            <!-- Error handling Server side -->
                            @error('username')
                                <p class="text-xs font-medium text-red-500 ">{{ $message }}</p>
                            @enderror 
                        </div> 
                            <x-text-input 
                                id="username" 
                                name="username" 
                                type="text"
                                :value="old('username')"
                                class="mt-1 block w-full
                                        {{ $errors->has('username')
                                        ? 'border-red-500 focus:border-red-500 focus:ring-red-500'
                                        : 'border-gray-300 focus:sky-500 focus:ring-sky-500' }}"
                                x-bind:class="errors.username ? 'border-red-500 ring-red-500' : 'border-gray-300'"
                                placeholder="eg. jdoe"
                                @input="clearError('username')"
                                />                        
                    </div>
                    <!-- Email  -->
                    <div class="col-span-12 md:col-span-6">
                        <div class="flex items-center justify-between">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email<span class="text-red-600"> *</span></label>
                            <p x-show="errors.email" x-text="errors.email" class="text-xs font-medium text-red-500 "></p>
                            @error('email')
                                <p class="text-xs font-medium text-red-500 ">{{ $message }}</p>
                            @enderror
                        </div>
                            <x-text-input 
                                id="email" 
                                name="email" 
                                type="email"
                                :value="old('email')"
                                class="mt-1 block w-full {{ $errors->has('email') 
                                        ? 'border-red-500 focus:border-red-500 focus:ring-red-500' 
                                        : 'border-gray-300 focus:sky-500 focus:ring-sky-500' }}"
                                x-bind:class="errors.email ? 'border-red-500 ring-red-500' : 'border-gray-300'"
                                placeholder="eg. johndoe@gmail.com"
                                @input="clearError('email')"
                                />
                                                                        
                    </div>
                    <!-- First Name  -->
                    <div class="col-span-12 md:col-span-5">
                        <div class="flex items-center justify-between">
                            <label for="first_name" class="block font-medium text-sm text-gray-700">First Name<span class="text-red-600"> *</span></label>
                            <p x-show="errors.first_name" x-text="errors.first_name " class="text-xs font-medium text-red-500 "></p>
                            @error('first_name')
                                    <p class="text-xs font-medium text-red-500 ">{{ $message }}</p>
                            @enderror
                        </div>
                            <x-text-input 
                                id="first_name" 
                                name="first_name" 
                                type="text"
                                :value="old('first_name')"
                                class="mt-1 block w-full"
                                x-bind:class="errors.first_name ? 'border-red-500 ring-red-500' : 'border-gray-300'"
                                placeholder="eg. John"
                                @input="clearError('first_name')"
                            />
                                
                    </div>
                    <!-- Last Name  -->
                    <div class="col-span-12 md:col-span-5">
                        <div class="flex items-center justify-between">
                            <label for="last_name" class="block font-medium text-sm text-gray-700">Last Name<span class="text-red-600"> *</span></label>
                            <p x-show="errors.last_name" x-text="errors.last_name" class="text-xs font-medium text-red-500 "></p>
                            @error('last_name')
                                <p class="text-xs font-medium text-red-500 ">{{ $message }}</p>
                            @enderror
                        </div>
                            <x-text-input 
                                id="last_name" 
                                name="last_name" 
                                type="text" 
                                :value="old('last_name')"
                                class="mt-1 block w-full"
                                x-bind:class="errors.last_name ? 'border-red-500 ring-red-500' : 'border-gray-300'"
                                placeholder="eg. Doe"
                                @input="clearError('last_name')"
                            />
                    </div>
                    <!-- Suffix  -->
                    <div class="col-span-12 md:col-span-2">
                        <div class="flex items-center justify-between">
                            <label for="suffix" class="block font-medium text-sm text-gray-700">Suffix</label>
                            <p x-show="errors.suffix" x-text="errors.suffix" class="text-xs font-medium text-red-500 "></p>
                            @error('suffix')
                                <p class="text-xs font-medium text-red-500 ">{{ $message }}</p>
                            @enderror
                        </div>
                            <x-text-input 
                                id="suffix" 
                                name="suffix" 
                                type="text" 
                                :value="old('suffix')"
                                class="mt-1 block w-full"
                                x-bind:class="errors.suffix ? 'border-red-500 ring-red-500' : 'border-gray-300'"
                                placeholder="eg. Jr. Sr. I, II, III"
                                @input="clearError('suffix')"
                            />  
                    </div>
                        <!-- Account Management Section   -->
                        <div class="col-span-12 grid grid-cols-12 gap-6">
                            <!-- Role and Access Management Header  -->
                            <div class="col-span-12 flex flex-col  ">
                                <div class="flex items-center gap-1">
                                    <x-heroicon-o-user class="w-5 h-5 text-gray-700" />
                                    <h2 class=" text-md text-gray-600 font-bold">
                                        {{ __('Role & Access Management') }}
                                    </h2>
                                </div>
                                <p class="text-xs text-gray-500">
                                    {{ __('Assign user \'s position, unit, and access levels.') }}
                                </p>
                            </div>
                            <!-- Unit and Position Section  -->
                            <div class="col-span-12 md:col-span-7 flex flex-col gap-4">
                                <!-- Display validation errors for unit and position selection -->
                                @error('unit-error')
                                    <p class="text-sm font-medium p-2 border-red-500 border text-red-500 bg-red-100 rounded-md my-1">{{ $message }}</p>
                                @enderror
                                <!-- Unit Dropdown  -->
                                <div class="flex flex-col">
                                    <div class="flex items-center justify-between">
                                        <label for="unit" class="block font-medium text-sm text-gray-700">Unit<span class="text-red-600"> *</span></label>
                                        <p x-show="errors.unit" x-text="errors.unit" class="text-xs font-medium text-red-500 "></p>
                                    </div>
                                    <!-- Searchable Select Dropdown Component -->
                                    <x-searchable-select-dropdown 
                                        :items="$units"
                                        name="unit_id"
                                        placeholder="Select Unit"
                                    />
                                </div>
                                <!-- Position Dropdown  -->
                                <div class="flex flex-col">    
                                    <div class="flex items-center justify-between">
                                        <label for="position" class="block font-medium text-sm text-gray-700">Position <span class="text-red-600"> *</span></label>
                                        <p x-show="errors.position" x-text="errors.position" class="text-xs font-medium text-red-500 "></p>
                                    </div>
                                    <!-- Dropdown -->
                                    <div 
                                        x-data="{ open: false, selected: 'Select Position', selectedValue: ' ' }" 
                                        class="relative w-full">
                                        <button 
                                            type="button"
                                            @click="open = !open"
                                            x-bind:class="errors.position ? 'border-red-500 ring-red-500' : 'border-gray-300'"
                                            class="w-full flex justify-between items-center bg-white border border-gray-200   rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outline-none p-2.5 hover:bg-gray-50 transition-colors">
                                            <span x-text="selected"></span>
                                            <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                                        </button>

                                        <!-- Dropdown Content -->
                                        <div 
                                            x-show="open"
                                            @click.outside="open = false"
                                            x-transition
                                            class="absolute z-10 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                                            <button 
                                                type="button"
                                                @click="selected = 'Unit Head'; selectedValue = 'Unit Head'; open = false; clearError('position');"
                                                class="block w-full px-4 py-2 text-left text-sm hover:bg-sky-100">
                                                Unit Head
                                            </button> 
                                            <button
                                                type="button"
                                                @click="selected = 'Staff'; selectedValue = 'Staff'; open = false; clearError('position');"
                                                class="block w-full px-4 py-2 text-left text-sm hover:bg-sky-100">
                                                Staff
                                            </button>
                                        </div>

                                        <!-- Hidden Input for Position Value   -->
                                        <input type="hidden" name="position" :value="selectedValue">
                                    </div>
                                </div>
                            </div>
                            <!-- Administrative Access Section -->
                            <div class="col-span-12 md:col-span-5 flex items-center justify-center">
                                <div class=" bg-amber-50 border border-amber-500 shadow-md rounded-xl p-4 space-y-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="bg-amber-100 rounded-full p-4 flex items-center">
                                            <x-heroicon-o-exclamation-triangle class="w-5 h-5 text-amber-500 scale-125" />
                                        </div>
                                        <p class="text-sm text-amber-600">
                                            Setting this account as <span class="font-semibold">Admin</span> will grant full administrative privileges.
                                        </p>
                                    </div>
                                    <!-- Is admin section  -->
                                    <div 
                                        x-data="{ is_super_admin: 0 }" 
                                        class="flex items-center justify-between shadow-md  border border-amber-500/10 bg-white rounded-lg px-4 py-3"
                                        >
                                        <div>
                                            <p class="text-sm font-bold text-gray-800">Administrator Access</p>
                                            <p class="text-xs text-gray-800">Enable full system control</p>
                                        </div>

                                        <button 
                                            type="button"
                                            @click="is_super_admin = !is_super_admin"
                                            :class="is_super_admin ? 'bg-amber-600' : 'bg-gray-300'"
                                            class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors"
                                        >
                                            <span 
                                                :class="is_super_admin ? 'translate-x-6' : 'translate-x-1'"
                                                class="inline-block h-4 w-4 transform bg-white rounded-full transition"
                                            ></span>
                                        </button>
                                        <!-- Hidden Input  -->
                                        <input type="hidden" name="is_super_admin" :value="is_super_admin ? 1 : 0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit and Cancel Buttons   -->
                        <div class="col-span-12 mt-5">
                            <div class="flex items-center justify-end gap-4">
                                <div class="flex justify-between items-center gap-5">
                                    <a href="{{ route('accounts') }}" class="text-sm font-semibold text-gray-400 hover:text-gray-500">{{ __('Cancel') }}</a>
                                    <button 
                                        type="button"
                                        @click="validateForm()"
                                        class="capitalize flex items-center bg-sky-500 hover:bg-sky-400 text-white text-sm font-semibold px-6 py-2 rounded">
                                        <x-heroicon-s-plus class="w-5 h-5 mr-2 font-bold" />
                                        {{ __('Create Account') }}
                                    </button>                           
                                </div>
                            </div>
                        </div>
                </div>
        </form>
    <!-- Component Form Confirmation Modal and Loading Modal -->
    <!-- resources\views\components\form\form-confirm-modal.blade.php -->
    <!-- resources\views\components\form\loading-modal.blade.php -->
    <x-form.form-confirm-modal 
        open="openAddUserModal" 
        confirmed="confirmed" 
        form="addUserAccountForm"
        title="Confirm Action" 
        message="Please confirm that you want to create this account."
    />
    <x-form.loading-modal open="loading" id="loadingAddUserModal" message="Processing..." />
</div>