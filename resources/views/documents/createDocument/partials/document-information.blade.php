<div class="col-span-1 mt-4" x-data="{ sourceType: 'internal' }">
    <h4 class="text-lg font-semibold text-gray-600 mb-4">Document Information</h4>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="lg:col-span-2">
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Document Name <span class="text-red-500">*</span>
            </label>
            <x-text-input 
                type="text"
                class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300"
                placeholder="e.g Memorandum of Agreement" 
                name="document_name"
                required/>
        </div>

        <div x-data="{ selectedId: '{{ old('type_id') }}', selectedName: 'Select Type' }">
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Document Type <span class="text-red-500">*</span>
            </label>
            <input type="hidden" name="type_id" x-model="selectedId" required>
           
            <x-dropdown align="left" width="w-full">
                <x-slot name="trigger">
                    <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:border-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                        <span x-text="selectedName"></span>
                        <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                    </button>
                </x-slot>
                <x-slot name="content">
                    <button type="button" @click="selectedId = ''; selectedName = 'Select Type'" class="block w-full px-4 py-2 text-left text-sm text-gray-500 hover:bg-gray-100 transition-colors">Clear Selection</button>
                    @foreach($types as $type)
                        <button 
                            type="button" 
                            @click="selectedId = '{{ $type->id }}'; selectedName = '{{ addslashes($type->type_name) }}'"
                            class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                            {{ $type->type_name }}
                        </button>
                    @endforeach
                </x-slot>
            </x-dropdown>
        </div>

        <div x-data="{ selectedCategory: '{{ old('category') }}', displayCategory: 'Select Category' }">
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Category <span class="text-red-500">*</span>
            </label>
            <input type="hidden" name="category" x-model="selectedCategory" required>

            <x-dropdown align="left" width="w-full">
                <x-slot name="trigger">
                    <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:border-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                        <span x-text="displayCategory"></span>
                        <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                    </button>
                </x-slot>
                <x-slot name="content">
                    <button type="button" @click="selectedCategory = ''; displayCategory = 'Select Category'" class="block w-full px-4 py-2 text-left text-sm text-gray-500 hover:bg-gray-100 transition-colors">Clear Selection</button>
                    <button type="button" @click="selectedCategory = 'Soft Copy'; displayCategory = 'Soft Copy'" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Soft Copy</button>
                    <button type="button" @click="selectedCategory = 'Hard Copy'; displayCategory = 'Hard Copy'" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Hard Copy</button>
                </x-slot>
            </x-dropdown>
        </div>

        <div x-data="{ selectedPriority: '{{ old('priority_level_id') }}', displayPriority: 'Select Level' }">
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Priority Level <span class="text-red-500">*</span>
            </label>
            <input type="hidden" name="priority_level_id" x-model="selectedPriority" required>

            <x-dropdown align="left" width="w-full">
                <x-slot name="trigger">
                    <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:border-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                        <span x-text="displayPriority"></span>
                        <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                    </button>
                </x-slot>
                <x-slot name="content">
                    <button type="button" @click="selectedPriority = ''; displayPriority = 'Select Level'" class="block w-full px-4 py-2 text-left text-sm text-gray-500 hover:bg-gray-100 transition-colors">Clear Selection</button>
                    @foreach($priorityLevels as $priority)
                        <button 
                            type="button" 
                            @click="selectedPriority = '{{ $priority->id }}'; displayPriority = '{{ addslashes($priority->priority_name) }}'"
                            class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                            {{ $priority->priority_name }}
                        </button>
                    @endforeach
                </x-slot>
            </x-dropdown>
        </div>

        <div class="flex items-center lg:mt-8">
            <input type="checkbox" id="is_confidential" name="is_confidential" value="1" class="w-4 h-4 text-red-500 bg-white border-red-400 rounded focus:ring-red-500 cursor-pointer">
            <label class="ml-2 text-sm font-medium text-red-500 cursor-pointer" for="is_confidential">
                Is the Document Confidential? <span class="text-red-500">*</span>
            </label>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                File Upload <span class="text-gray-400 font-normal">(Optional):</span>
            </label>
            <input type="file" name="file_upload" class="w-full text-sm focus:outline-none shadow-none text-gray-700 hover:cursor-pointer" />
        </div>
    
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                File Link <span class="text-gray-400 font-normal">(Optional):</span>
            </label>
            <x-text-input 
                type="text" 
                name="file_link"
                placeholder="e.g https://gdrive//MOA.pdf"
                class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300 border border-gray-300 rounded focus:outline-none focus:ring-sky-400 focus:border-sky-400"
            />
        </div>

        <div class="lg:col-span-2">
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Description
            </label>
            <textarea name="description" rows="4" placeholder="Document description" 
                      class="bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:border-brand-blue block w-full p-3 resize-none flex-grow min-h-[120px]"></textarea>
        </div>

        <div class="lg:col-span-2">
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Source Type <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center gap-6 mt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="source_type" value="internal" x-model="sourceType" 
                           class="w-4 h-4 text-brand-blue bg-white border-gray-300 focus:ring-brand-blue cursor-pointer">
                    <span class="text-sm font-medium text-gray-500">Internal</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="source_type" value="external" x-model="sourceType" 
                           class="w-4 h-4 text-brand-blue bg-white border-gray-300 focus:ring-brand-blue cursor-pointer">
                    <span class="text-sm font-medium text-gray-500">External</span>
                </label>
            </div>
        </div>

        <div class="lg:col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-6" x-show="sourceType === 'external'" x-collapse>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-600">
                    Sender Name <span class="text-red-500">*</span>
                </label>
                <x-text-input 
                    type="text"
                    name="sender_name"
                    class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300"
                    placeholder="e.g Juan Dela Cruz" 
                    x-bind:required="sourceType === 'external'"/>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-600">
                    Sender Email <span class="text-red-500">*</span>
                </label>
                <x-text-input 
                    type="email"
                    name="sender_email"
                    class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300"
                    placeholder="e.g batangquiapo@gmail.com" 
                    x-bind:required="sourceType === 'external'"/>
            </div>
        </div>

    </div>
</div>