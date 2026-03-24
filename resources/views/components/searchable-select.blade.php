@props([
    'id',                     // HTML ID for the input
    'label',                  // The label text
    'required' => false,      // Whether to show the red asterisk
    'model',                  // The Livewire property for the search input (e.g., 'unitSearch')
    'results',                // The array/collection of results
    'valueField' => 'id',     // The field name for the ID to pass to the backend
    'displayField' => 'name', // The field name for the main text to display
    'subDisplayField' => null,// (Optional) The field name for the secondary text (like abbreviation)
    'selectMethod',           // The Livewire method to call on click (e.g., 'selectUnit')
    'errorField',             // The field to check for validation errors
    'placeholder' => 'Click to select or type to search...',
    'emptyMessage' => 'No results found.'
])

<div class="relative" x-data="{ searchOpen: false }">
    <x-input-label :for="$id">
        {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
    </x-input-label>
    
    <div class="relative mt-1">
        <x-text-input 
            wire:model.live.debounce.300ms="{{ $model }}"
            @focus="searchOpen = true"
            @click.outside="searchOpen = false"
            :id="$id" 
            type="text" 
            class="w-full pl-10 cursor-pointer" 
            :placeholder="$placeholder" 
            autocomplete="off"
        />
        <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" />
        <x-heroicon-s-chevron-down class="w-4 h-4 text-gray-400 absolute right-3 top-3 pointer-events-none" />
    </div>

    <div x-show="searchOpen" 
         x-transition
         class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg max-h-60 overflow-y-auto">
        <ul class="py-1 text-sm text-gray-700">
            @forelse($results as $item)
                <li>
                    <button 
                        type="button"
                        {{-- Dynamically call the method and pass the dynamic fields --}}
                        wire:click="{{ $selectMethod }}({{ $item->{$valueField} }}, '{{ addslashes($item->{$displayField}) }}')"
                        @click="searchOpen = false"
                        class="w-full text-left px-4 py-2 hover:bg-sky-50 hover:text-sky-700 transition-colors flex justify-between items-center">
                        
                        <span class="font-medium">{{ $item->{$displayField} }}</span>
                        
                        @if($subDisplayField && isset($item->{$subDisplayField}))
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded">
                                {{ $item->{$subDisplayField} }}
                            </span>
                        @endif
                    </button>
                </li>
            @empty
                <li class="px-4 py-3 text-gray-500 text-center italic">{{ $emptyMessage }}</li>
            @endforelse
        </ul>
    </div>
    
    <x-input-error :messages="$errors->get($errorField)" class="mt-2 text-xs text-red-600" />
</div>