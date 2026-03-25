@props([
    'id',
    'title' => 'Are you sure?',
    'message' => 'This action cannot be undone. Please confirm your decision.',
    'confirmText' => 'Confirm & Proceed',
    'action' => '',
    'type' => 'danger' // 'danger' or 'info'
])

@php
    $iconColor = $type === 'danger' ? 'bg-red-500' : 'bg-brand-blue';
    $btnColor = $type === 'danger' ? 'bg-red-500 hover:bg-red-600' : 'bg-brand-blue hover:bg-blue-700';
@endphp

<div 
    x-data="{ 
        open: false, 
        confirmed: false,
        name: '' 
    }" 
    @open-modal-{{ $id }}.window="open = true; name = $event.detail.name || ''"
    class="inline-block"
>
    <template x-teleport="body">
        <div
            x-cloak
            x-show="open"
            class="fixed inset-0 z-[100] flex items-center justify-center px-4 py-6"
            @keydown.escape.window="open = false">

            <div
                x-show="open"
                x-transition.opacity
                class="absolute inset-0 bg-black/50">
            </div>

            <div
                x-show="open"
                x-transition.scale.95
                
                class="relative z-10 w-full max-w-lg bg-white rounded-xl shadow-2xl overflow-hidden">

                <form @submit.prevent="$dispatch('submit-{{ $id }}'); open = false; confirmed = false" class="px-7 py-8">
                    <div class="flex flex-col items-center justify-center text-center">
                        <div class="flex items-center justify-center rounded-full w-20 h-20 mb-4 {{ $iconColor }} shadow-lg shadow-red-100">
                            @if($type === 'danger')
                                <x-heroicon-s-exclamation-triangle class="w-10 h-10 text-white" />
                            @else
                                <x-heroicon-s-information-circle class="w-10 h-10 text-white" />
                            @endif
                        </div>

                        <h2 class="text-xl font-bold text-gray-800">{{ $title }}</h2>
                        
                        <p class="mt-2 text-sm text-gray-500 lead   ing-relaxed">
                            {{ $message }}
                            <template x-if="name">
                                <span class="block mt-1 font-bold text-gray-700" x-text="name"></span>
                            </template>
                        </p>

                        <div class="w-full mt-6 p-4 bg-gray-50 rounded-lg border border-gray-100 flex items-center justify-center gap-3">
                            <input 
                                type="checkbox" 
                                x-model="confirmed"
                                id="check-{{ $id }}"
                                class="w-4 h-4 text-sky-500 border-gray-300 rounded focus:ring-sky-500 cursor-pointer">
                            <label for="check-{{ $id }}" class="text-sm font-medium text-gray-600 cursor-pointer select-none">
                                I have reviewed the details.
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-3 mt-8 pt-4 border-t border-gray-100">
                        <button
                            type="button"
                            @click="open = false"
                            class="w-full sm:w-auto px-5 py-2.5 rounded-lg text-sm font-semibold text-gray-500 hover:bg-gray-100 transition-colors">
                            Cancel
                        </button>
                        
                        <button 
                            type="submit"
                            :disabled="!confirmed"
                            class="w-full sm:w-auto flex justify-center items-center px-5 py-2.5 rounded-lg text-sm font-semibold text-white transition-all disabled:opacity-50 disabled:cursor-not-allowed {{ $btnColor }}">
                            <x-heroicon-s-check class="w-4 h-4 mr-2" />
                            {{ $confirmText }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>