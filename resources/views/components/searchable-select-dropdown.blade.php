
<!-- Component Class for Searchable Select Dropdown -->
<!-- app\View\Components\SearchableSelectDropdown.php -->


<!-- Component Dropdown Blade View -->
<!-- resources\views\components\searchable-select-dropdown.blade.php -->
<div 
        x-data="{
            open: false,
            search: '',
            selected: '{{ $placeholder ?? 'Select Unit' }}',
            selectedId: '',
            items: @js($items),
            filtered() {
                return this.items.filter(i => 
                    i.unit_name.toLowerCase().includes(this.search.toLowerCase()) ||
                    i.abbreviation.toLowerCase().includes(this.search.toLowerCase())
                )
            }
        }"
        class="relative w-full">

            <!-- Button -->
            <button 
                type="button"
                @click="
                    open = !open;
                    if (open) {
                        $nextTick(() => $refs.searchInput.focus())
                    }
                "
                class="w-full flex justify-between items-center bg-white  hover:bg-gray-50 border border-gray-200   rounded-lg p-2.5 focus:outline-none  transition-colors">
                <span x-text="selected"></span>
                <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
            </button>

            <!-- Dropdown -->
            <div 
                x-show="open"
                @click.outside="open = false"
                x-transition
                x-cloak
                class="absolute z-10 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-lg">

                <!--  Search -->
                <div class="p-2">
                    <div class="relative">
                        <!-- Icon -->
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <x-heroicon-o-magnifying-glass class="w-4 h-4 text-gray-400" />
                        </div>
                        <!-- Input -->
                        <input 
                            type="text"
                            x-model="search"
                            x-ref="searchInput"
                            placeholder="Search..."
                            class="w-full pl-9 pr-3 py-2 border border-sky-100 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-sky-500 hover:border-sky-300 focus:border-sky-500 transition-colors">
                    </div>
                </div>

                <div class="w-full flex flex-col overflow-y-auto no-scrollbar"
                    :class="filtered().length === 0 ? 'h-auto' : 'h-40'">
            
                    <!-- Dropdown Items -->
                    <template x-for="item in filtered()" :key="item.id">
                        <button 
                            type="button"
                            @click="
                                selected = item.unit_name;
                                selectedId = item.id;
                                open = false;
                            "
                            class="flex justify-between w-full px-4 py-2 text-sm hover:bg-sky-100"
                        >
                            <span x-text="item.unit_name"></span>
                            <span 
                                class="py-1 px-2 bg-sky-400 text-white rounded-md text-xs"
                                x-text="item.abbreviation"
                            ></span>
                        </button>
                    </template>
            
                    <!-- Search Empty -->
                    <div 
                        x-show="filtered().length === 0"
                        class="px-4 py-2 text-sm text-gray-500 text-center"
                    >
                        No results found
                    </div>
                </div> 
            </div>

            <!-- Hidden input -->
            <input type="hidden" name="{{ $name }}" :value="selectedId">
</div>                                      