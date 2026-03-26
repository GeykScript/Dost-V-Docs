@props([
    'id',                     
    'name',                   
    'label',                  
    'required' => false,      
    'results' => [],          
    'valueField' => 'id',     
    'displayField' => 'name', 
    'subDisplayField' => null,
    'placeholder' => 'Click to select or type to search...',
    'emptyMessage' => 'No results found.'
])

<div class="relative" 
     x-data='{
         open: false,
         search: "",
         selectedValue: "{{ old($name) }}",
         selectedText: "",
         items: @json($results),
         
         get filteredItems() {
             if (this.search === "" || this.search === this.selectedText) return this.items;
             
             return this.items.filter(item => {
                 const mainField = String(item["{{ $displayField }}"] || "").toLowerCase();
                 const subField = "{{ $subDisplayField }}" ? String(item["{{ $subDisplayField }}"] || "").toLowerCase() : "";
                 const searchTerm = this.search.toLowerCase();
                 return mainField.includes(searchTerm) || subField.includes(searchTerm);
             });
         },
         
         init() {
             if (this.selectedValue) {
                 let selectedItem = this.items.find(i => String(i["{{ $valueField }}"]) === String(this.selectedValue));
                 if (selectedItem) {
                     this.selectedText = selectedItem["{{ $displayField }}"];
                     this.search = this.selectedText;
                 }
             }
             
             $watch("search", value => {
                 if (value !== this.selectedText) this.selectedValue = ""; 
             });

             // Announce BOTH value and text when changed
             $watch("selectedValue", value => {
                 $dispatch("custom-change", { name: "{{ $name }}", value: value, text: this.selectedText });
             });
         },
         
         selectItem(item) {
             this.selectedValue = item["{{ $valueField }}"];
             this.selectedText = item["{{ $displayField }}"];
             this.search = this.selectedText; 
             this.open = false;               
         }
     }'
     
     @update-items.window="
         if($event.detail.name === '{{ $name }}') { 
             items = $event.detail.items; 
             selectedValue = ''; 
             search = ''; 
             selectedText = ''; 
         }
     "
     
     {{-- NEW: Listen for a command to clear the input --}}
     @reset-select.window="
         if($event.detail.name === '{{ $name }}') { 
             selectedValue = ''; 
             search = ''; 
             selectedText = ''; 
         }
     ">
     
    <x-input-label :for="$id">
        {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
    </x-input-label>
    
    <div class="relative mt-1">
        <input type="hidden" name="{{ $name }}" :value="selectedValue">
        
        <x-text-input 
            x-model="search"
            @focus="open = true"
            @click.outside="open = false"
            :id="$id" 
            type="text" 
            class="w-full pl-10 cursor-pointer" 
            placeholder="{{ $placeholder }}" 
            autocomplete="off"
        />
        <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" />
        <x-heroicon-s-chevron-down class="w-4 h-4 text-gray-400 absolute right-3 top-3 pointer-events-none" />
    </div>

    <div x-show="open" 
         style="display: none;"
         x-transition
         class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg max-h-60 overflow-y-auto">
        <ul class="py-1 text-sm text-gray-700">
            <template x-for="item in filteredItems" :key="item['{{ $valueField }}']">
                <li>
                    <button 
                        type="button"
                        @click="selectItem(item)"
                        class="w-full text-left px-4 py-2 hover:bg-sky-50 hover:text-sky-700 transition-colors flex justify-between items-center"
                        :class="{ 'bg-sky-50 text-sky-700': String(selectedValue) === String(item['{{ $valueField }}']) }">
                        
                        <span class="font-medium" x-text="item['{{ $displayField }}']"></span>
                        
                        @if($subDisplayField)
                            <template x-if="item['{{ $subDisplayField }}']">
                                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded" x-text="item['{{ $subDisplayField }}']"></span>
                            </template>
                        @endif
                    </button>
                </li>
            </template>
            
            <template x-if="filteredItems.length === 0">
                <li class="px-4 py-3 text-gray-500 text-center italic">{{ $emptyMessage }}</li>
            </template>
        </ul>
    </div>
    <x-input-error :messages="$errors->get($name)" class="mt-2 text-xs text-red-600" />
</div>

