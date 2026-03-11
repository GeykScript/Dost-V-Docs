<!--Part 2 - actions section -->
<div class="col-span-1 mt-4">
    <h4 class="text-lg font-semibold text-gray-600 mb-4">Document Actions</h4>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
        <!--Action Selection-->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Action <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                    <select class="bg-white border border-gray-200 text-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5 appearance-none">
                        <option value="">Select Action</option>
                    </select>
                </div>
            </div>

            <!--Deadline-->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-600">
                    Deadline <span class="text-red-500">*</span>
                </label>
                 <input 
                type="date" 
                placeholder="YYYY/MM/DD"
                class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300 
                    border border-gray-300 rounded focus:outline-none  focus:ring-sky-400 focus:border-sky-400"
            />

            </div>

            <!--Sender Section -->
            <div class="lg:col-span-2 mt-2">
                <h5 class="text-base font-semibold text-gray-400 mb-4">From</h5>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                  <div>
                            <label class="block mb-2 text-sm font-medium text-gray-600">
                             Unit Source <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select class="bg-white border border-gray-200 text-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5 appearance-none">
                                <option value="">Select Unit Source</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-600">
                            Source Personnel <span class="text-red-500">*</span>
                        </label>
                        <input type="text" value="John E. Doe" readonly 
                                class="bg-gray-50 border border-gray-200 text-gray-500 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed">
                    </div>
                </div>
            </div>

            <!--- Route To Section, tagging feature -->
            <div class="lg:col-span-2 mt-2">
                <h5 class="text-base font-semibold text-gray-400 mb-4">Route To</h5>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                            <label class="block mb-2 text-sm font-medium text-gray-600">
                            Tag Unit <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select class="bg-white border border-gray-200 text-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5 appearance-none">
                                <option value="">Select Unit</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-600">
                            Tag Personnel <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select class="bg-white border border-gray-200 text-gray-400 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-2.5 appearance-none">
                                <option value="">Select Personnel</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2 mt-2">
                <label class="block mb-2 text-sm font-medium text-gray-600">
                    Tags:
                </label>
                <div class="bg-white border border-gray-200 rounded-lg p-3 min-h-[90px] flex items-start gap-2 flex-wrap cursor-text">
                    {{-- Selected Tag Pill --}}
                    <span class="inline-flex items-center gap-1.5 bg-cyan-100 text-cyan-500 text-xs font-semibold px-3 py-1.5 rounded-md">
                        Juan Dela Cruz
                        <button type="button" class="text-cyan-500 hover:text-cyan-700 focus:outline-none">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </span>
                    
                </div>
            </div>
            <div class="lg:col-span-2 mt-2">
                <label class="block mb-2 text-sm font-medium text-gray-600">
                    Remarks:
                </label>
                <textarea rows="4" placeholder="Document Remarks" 
                        class="bg-white border border-gray-200 text-gray-700 placeholder:text-gray-300 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outline-none block w-full p-2.5"></textarea>
            </div>
        </div>
</div>
