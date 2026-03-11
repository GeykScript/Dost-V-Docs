<div class="col-span-1 mt-4" x-data="{ sourceType: 'internal' }">
    <h4 class="text-lg font-semibold text-gray-600 mb-4">Document Information</h4>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        {{-- Document Name (Full Width) --}}
        <div class="lg:col-span-2">
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Document Name <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   class="bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5">
        </div>

        {{-- Document Type --}}
        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Document Type <span class="text-red-500">*</span>
            </label>
            <select class="bg-white border border-gray-200 text-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5 appearance-none">
                <option value="">Select Type</option>
                </select>
        </div>

        {{-- Category --}}
        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Category <span class="text-red-500">*</span>
            </label>
            <select class="bg-white border border-gray-200 text-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5 appearance-none">
                <option value="">Select Category</option>
                </select>
        </div>

        {{-- Priority Level --}}
        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Priority Level <span class="text-red-500">*</span>
            </label>
            <select class="bg-white border border-gray-200 text-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5 appearance-none">
                <option value="">Select Action</option>
                </select>
        </div>

        {{-- Confidential Checkbox --}}
        <div class="flex items-center lg:mt-8">
            <div class="bg-blue-500 rounded p-0.5 flex items-center justify-center">
                <input type="checkbox" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
            </div>
            <label class="ml-2 text-sm font-semibold text-gray-600 cursor-pointer">
                Is the Document Confidential? <span class="text-red-500">*</span>
            </label>
        </div>

        {{-- File Upload --}}
        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                File Upload <span class="text-gray-400 font-normal">(Optional):</span>
            </label>
            <input type="file" 
                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border border file:border-gray-200 file:text-sm file:font-medium file:bg-white file:text-gray-600 hover:file:bg-gray-50 border-gray-200 rounded-lg cursor-pointer">
        </div>

        {{-- File Link --}}
        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                File Link <span class="text-gray-400 font-normal">(Optional):</span>
            </label>
            <input type="text" placeholder="https://gdrive//MOA.pdf" 
                   class="bg-white border border-gray-200 text-gray-400 placeholder-gray-300 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5">
        </div>

        {{-- Description --}}
        <div class="lg:col-span-2">
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Description
            </label>
            <textarea rows="4" placeholder="Input here" 
                      class="bg-white border border-gray-200 text-gray-700 placeholder-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5"></textarea>
        </div>

        {{-- Source Type --}}
        <div class="lg:col-span-2">
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Source Type <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center gap-6 mt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="source_type" value="internal" x-model="sourceType" 
                           class="w-4 h-4 text-blue-500 bg-white border-gray-300 focus:ring-blue-500 cursor-pointer">
                    <span class="text-sm font-semibold text-gray-500">Internal</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="source_type" value="external" x-model="sourceType" 
                           class="w-4 h-4 text-blue-500 bg-white border-gray-300 focus:ring-blue-500 cursor-pointer">
                    <span class="text-sm font-semibold text-gray-500">External</span>
                </label>
            </div>
        </div>

        {{-- Sender Information (Shows ONLY if External is selected) --}}
        <div class="lg:col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-6" x-show="sourceType === 'external'" x-collapse>
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-600">
                    Sender Name <span class="text-red-500">*</span>
                </label>
                <input type="text" placeholder="Tanggol Montenegro" 
                       class="bg-white border border-gray-200 text-gray-700 placeholder-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5">
            </div>
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-600">
                    Sender Email <span class="text-red-500">*</span>
                </label>
                <input type="email" placeholder="batangquiapo@gmail.com" 
                       class="bg-white border border-gray-200 text-gray-700 placeholder-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5">
            </div>
        </div>

    </div>
</div>