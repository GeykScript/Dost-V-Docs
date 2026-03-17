<!--Part 1, Document details-->
<div class="col-span-1 mt-4" x-data="{ sourceType: 'internal' }">
    <h4 class="text-lg font-semibold text-gray-600 mb-4">Document Information</h4>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Document Name -->
        <div class="lg:col-span-2">
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Document Name <span class="text-red-500">*</span>
            </label>
            <x-text-input 
                type="text"
                class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300 "
                placeholder="e.g Memorandum of Agreement" 
                name="document_name"
                required/>
            
        </div>

        <!-- Document Type -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Document Type <span class="text-red-500">*</span>
            </label>
           
            <x-dropdown align="left" width="w-full">
                    <x-slot name="trigger">
                    <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                        <span>Select Type</span>
                        <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                    </button>
                </x-slot>
                <x-slot name="content">
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Select Type</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Official Record</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Letter</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Administrative</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Financial Files</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Reports</button>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Category -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Category <span class="text-red-500">*</span>
            </label>
            <x-dropdown align="left" width="w-full">
                    <x-slot name="trigger">
                    <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                        <span>Select Category</span>
                        <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                    </button>
                </x-slot>
                <x-slot name="content">
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Select Category</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Soft Copy</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Hard Copy</button>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Priority Level -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Priority Level <span class="text-red-500">*</span>
            </label>
            <x-dropdown align="left" width="w-full">
                    <x-slot name="trigger">
                    <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                        <span>Select Level</span>
                        <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                    </button>
                </x-slot>
                <x-slot name="content">
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Select Level</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Express</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Urgent</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Rush</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Priority</button>
                        <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Routinary</button>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Confidential Checkbox -->
        <div class="flex items-center lg:mt-8">
            <input type="checkbox" id="is_confidential" class="w-4 h-4 text-red-500 bg-white border-red-400 rounded focus:ring-red-500 cursor-pointer">
            <label class="ml-2 text-sm font-medium text-red-500 cursor-pointer" for="is_confidential">
                Is the Document Confidential? <span class="text-red-500">*</span>
            </label>
        </div>

        <!-- File Upload -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                File Upload <span class="text-gray-400 font-normal">(Optional):</span>
            </label>
            
            <input type="file" class="w-full text-sm focus:outline-none shadow-none text-gray-700 hover:cursor-pointer  " />
        </div>
    
        <!-- File Link -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                File Link <span class="text-gray-400 font-normal">(Optional):</span>
            </label>
            <x-text-input 
                type="text" 
                placeholder="e.g https://gdrive//MOA.pdf"
                class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300 
                    border border-gray-300 rounded focus:outline-none  focus:ring-sky-400 focus:border-sky-400"
            />

        </div>

        <!-- Description -->
        <div class="lg:col-span-2">
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Description
            </label>
            <textarea rows="4" placeholder="Document description" 
                      class="bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue block w-full p-3 resize-none flex-grow min-h-[120px]"></textarea>
        </div>

        <!-- Source Type -->
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

        <!-- Sender Information (Shows ONLY if External is selected) -->
        <div class="lg:col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-6" x-show="sourceType === 'external'" x-collapse>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-600">
                    Sender Name <span class="text-red-500">*</span>
                </label>
                <x-text-input 
                type="text"
                class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300 "
                placeholder="e.g Juan Dela Cruz" 
                name="sender_name"
                required/>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-600">
                    Sender Email <span class="text-red-500">*</span>
                </label>
                <x-text-input 
                            type="email"
                            class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300 "
                            placeholder="e.g batangquiapo@gmail.com" 
                            name="sender_email"
                            required/>
            </div>
        </div>

    </div>
</div>