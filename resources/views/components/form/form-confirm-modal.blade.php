@props([
    'open' => 'openModal',   
    'confirmed' => 'confirmed', 
    'title' => 'Confirm Action',
    'message' => 'Are you sure you want to proceed?',
    'form' => '', 
    'confirmText' => 'Confirm & Submit'
])

<div x-show="{{ $open }}" x-cloak class="fixed inset-0 z-50">
    <div class="flex items-center justify-center min-h-screen bg-black/50 p-4">
        <div 
            x-show="{{ $open }}"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 flex flex-col items-center text-center"
        >
            <div class="bg-sky-500 rounded-full p-6">
                <x-heroicon-s-information-circle class="w-12 h-12 text-white " />
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-800 mt-3">{{ $title }}</h2>
                <p class="mt-2 text-md text-gray-600 leading-relaxed">{{ $message }}</p>
            </div>

            <!-- Checkbox -->
            <div class="mt-4 p-4 bg-gray-100 w-full">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" x-model="{{ $confirmed }}" 
                        class="rounded border-gray-300 text-brand-blue shadow-sm focus:brand-blue focus:ring-2 focus:ring-brand-blue" />   
                        <span class="text-sm font-medium text-gray-600">I understand and want to proceed</span>
                </label>
            </div>


            <!-- Buttons -->
            <div class="flex justify-end gap-2 mt-4 w-full">
                <button 
                    type="button"
                    @click="{{ $open }} = false; {{ $confirmed }} = false"
                    class="px-4 py-2 text-sm text-gray-600 font-semibold "
                >
                    Cancel
                </button>

                <button 
                    type="submit"
                    form="{{ $form }}"
                    :disabled="!{{ $confirmed }}"
                    :class="{{ $confirmed }} ? 'bg-sky-500 text-white' : 'bg-sky-400 text-white cursor-not-allowed'"
                    class="px-4 py-2 rounded flex items-center text-sm font-semibold "
                >
                    <x-heroicon-s-check class="w-4 h-4 mr-2 font-bold" />
                    {{ $confirmText }}
                </button>
            </div>
        </div>
    </div>
</div>