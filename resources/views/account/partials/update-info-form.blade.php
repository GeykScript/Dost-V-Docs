<section class="p-6">
    <header class="mb-8">
        <div class="flex gap-2 items-center">
            <x-heroicon-o-identification class="w-6 h-6 text-gray-800" />
            <h2 class="text-lg md:text-xl text-gray-800 font-bold">
                {{ __('Profile Information') }}
            </h2>
        </div>
        
        <div class="mt-4 bg-sky-50 border border-sky-100 rounded-lg p-4 flex gap-3">
            <x-heroicon-o-information-circle class="w-5 h-5 text-sky-600 flex-shrink-0 mt-0.5" />
            <div class="text-sm text-sky-800">
                <p class="font-medium mb-1">{{ __('Managing Employee Records') }}</p>
                <p class="text-sky-700 leading-relaxed">
                    {{ __('Update the profile details and contact information below. Please note that changing the username will immediately affect login credentials, and a valid, active email is required for the user to receive system notifications.') }}
                </p>
            </div>
        </div>
    </header>

    @if (session('status'))
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" class="mb-4 text-sm text-green-700 bg-green-50 border border-green-200 p-3 rounded-lg">
            {{ session('status') }}
        </div>
    @endif

    <form 
        id="profileUpdateForm"
        method="POST" 
        action="{{ route('accounts.update', $user->id) }}" 
        x-data="{
            original: {
                username: '{{ $user->username }}',
                email: '{{ $user->email }}',
                first_name: '{{ $user->first_name }}',
                last_name: '{{ $user->last_name }}',
                suffix: '{{ $user->suffix }}'
            },
            form: {
                username: '{{ old('username', $user->username) }}',
                email: '{{ old('email', $user->email) }}',
                first_name: '{{ old('first_name', $user->first_name) }}',
                last_name: '{{ old('last_name', $user->last_name) }}',
                suffix: '{{ old('suffix', $user->suffix) }}'
            },
            errors: {},
            clearedBackendErrors: {},
            generalError: '',
            
            get isDirty() {
                return this.form.username !== this.original.username ||
                       this.form.email !== this.original.email ||
                       this.form.first_name !== this.original.first_name ||
                       this.form.last_name !== this.original.last_name ||
                       this.form.suffix !== this.original.suffix;
            },
            
            validateAndProceed() {
                this.errors = {};
                this.clearedBackendErrors = {};
                this.generalError = '';
                let hasError = false;

                if (!this.form.username?.trim()) { this.errors.username = 'Username is required.'; hasError = true; }
                if (!this.form.email?.trim()) { this.errors.email = 'Email is required.'; hasError = true; }
                if (!this.form.first_name?.trim()) { this.errors.first_name = 'First name is required.'; hasError = true; }
                if (!this.form.last_name?.trim()) { this.errors.last_name = 'Last name is required.'; hasError = true; }

                if (hasError) return;

                if (!this.isDirty) {
                    this.generalError = 'No changes detected. Please modify at least one field to save.';
                    return; 
                }

                // If valid, open the modal
                $dispatch('open-modal-confirm-profile-update', { name: this.form.username });
            }
        }"
        class="space-y-6 mt-4"
    >
        @csrf
        @method('PUT')

        <template x-if="generalError">
            <div class="text-sm text-red-700 bg-red-50 border border-red-200 p-3 rounded-lg mb-4" x-text="generalError"></div>
        </template>

        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 md:col-span-6"> 
                <div class="flex items-baseline justify-between">
                    <x-input-label for="username">
                        {{ __('Username') }} <span class="text-red-500">*</span>
                    </x-input-label>
                    <div class="text-xs text-red-500 font-medium">
                        <template x-if="errors.username"><span x-text="errors.username"></span></template>
                        @error('username')<span x-show="!clearedBackendErrors.username && !errors.username">{{ $message }}</span>@enderror
                    </div>
                </div>
                <x-text-input 
                    id="username" 
                    name="username"
                    x-model="form.username" 
                    type="text" 
                    class="mt-1 block w-full transition-colors" 
                    x-bind:class="(errors.username || ({{ $errors->has('username') ? 'true' : 'false' }} && !clearedBackendErrors.username)) ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    @focus="errors.username = null; clearedBackendErrors.username = true"
                />
            </div>

            <div class="col-span-12 md:col-span-6">
                <div class="flex items-baseline justify-between">
                    <x-input-label for="email">
                        {{ __('Email') }} <span class="text-red-500">*</span>
                    </x-input-label>
                    <div class="text-xs text-red-500 font-medium">
                        <template x-if="errors.email"><span x-text="errors.email"></span></template>
                        @error('email')<span x-show="!clearedBackendErrors.email && !errors.email">{{ $message }}</span>@enderror
                    </div>
                </div>
                <x-text-input 
                    id="email"
                    name="email" 
                    x-model="form.email" 
                    type="email" 
                    class="mt-1 block w-full transition-colors" 
                    x-bind:class="(errors.email || ({{ $errors->has('email') ? 'true' : 'false' }} && !clearedBackendErrors.email)) ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    @focus="errors.email = null; clearedBackendErrors.email = true"
                />
            </div>

            <div class="col-span-12 md:col-span-5">
                <div class="flex items-baseline justify-between">
                    <x-input-label for="first_name">
                        {{ __('First Name') }} <span class="text-red-500">*</span>
                    </x-input-label>
                    <div class="text-xs text-red-500 font-medium">
                        <template x-if="errors.first_name"><span x-text="errors.first_name"></span></template>
                        @error('first_name')<span x-show="!clearedBackendErrors.first_name && !errors.first_name">{{ $message }}</span>@enderror
                    </div>
                </div>
                <x-text-input 
                    id="first_name" 
                    name="first_name"
                    x-model="form.first_name" 
                    type="text" 
                    class="mt-1 block w-full transition-colors" 
                    x-bind:class="(errors.first_name || ({{ $errors->has('first_name') ? 'true' : 'false' }} && !clearedBackendErrors.first_name)) ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    @focus="errors.first_name = null; clearedBackendErrors.first_name = true"
                />
            </div>

            <div class="col-span-12 md:col-span-5">
                <div class="flex items-baseline justify-between">
                    <x-input-label for="last_name">
                        {{ __('Last Name') }} <span class="text-red-500">*</span>
                    </x-input-label>
                    <div class="text-xs text-red-500 font-medium">
                        <template x-if="errors.last_name"><span x-text="errors.last_name"></span></template>
                        @error('last_name')<span x-show="!clearedBackendErrors.last_name && !errors.last_name">{{ $message }}</span>@enderror
                    </div>
                </div>
                <x-text-input 
                    id="last_name" 
                    name="last_name"
                    x-model="form.last_name" 
                    type="text" 
                    class="mt-1 block w-full transition-colors" 
                    x-bind:class="(errors.last_name || ({{ $errors->has('last_name') ? 'true' : 'false' }} && !clearedBackendErrors.last_name)) ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    @focus="errors.last_name = null; clearedBackendErrors.last_name = true"
                />
            </div>

            <div class="col-span-12 md:col-span-2">
                <div class="flex items-baseline justify-between">
                    <x-input-label for="suffix" :value="__('Suffix')" />
                    <div class="text-xs text-red-500 font-medium">
                        @error('suffix')<span x-show="!clearedBackendErrors.suffix">{{ $message }}</span>@enderror
                    </div>
                </div>
                <x-text-input 
                    id="suffix" 
                    name="suffix"
                    x-model="form.suffix" 
                    type="text" 
                    class="mt-1 block w-full transition-colors" 
                    x-bind:class="({{ $errors->has('suffix') ? 'true' : 'false' }} && !clearedBackendErrors.suffix) ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    @focus="clearedBackendErrors.suffix = true"
                />
            </div>
        </div>

        <div class="flex items-center justify-start lg:justify-end pt-5 border-t border-gray-100 mt-8">
            <x-primary-button 
                type="button"
                @click="validateAndProceed"
                class="capitalize bg-sky-500 hover:bg-sky-400 text-white transition-colors">
                {{ __('Save Changes') }}
            </x-primary-button>      
        </div>
    </form>
</section>

<x-form-confirmation-modal 
    id="confirm-profile-update"
    title="Update Profile Details?"
    message="You are about to change the profile credentials for this employee. Please confirm your decision."
    confirmText="Save Changes"
    type="info"
/>

<script>
    window.addEventListener('submit-confirm-profile-update', () => {
        document.getElementById('profileUpdateForm').submit();
    });
</script>