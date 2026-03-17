<!--Part 2 - actions section -->
<div class="col-span-1 mt-4">
    <h4 class="text-lg font-semibold text-gray-600 mb-4">Document Actions</h4>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
        <!--Action Selection-->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Action <span class="text-red-500">*</span>
            </label>
            <x-dropdown align="left" width="w-full">
                <x-slot name="trigger">
                    <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                        <span>For Signature</span>
                        <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                    </button>
                </x-slot>
                <x-slot name="content">
                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">For Signature</button>
                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">For Approval</button>
                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">For Review</button>
                </x-slot>
            </x-dropdown>
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
                        <x-dropdown align="left" width="w-full">
                                <x-slot name="trigger">
                                <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                                    <span>Select Unit</span>
                                    <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Select Unit</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Management Information System Unit</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Technical Operations</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Finance and Administrative Services</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Project Management Unit</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Human Resources</button>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-600">
                            Source Personnel <span class="text-red-500">*</span>
                        </label>
                        <input type="text" value="John E. Doe" readonly 
                        class="bg-gray-100 border-none focus:ring-0 focus:outline-none text-gray-500 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed">
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
                        <x-dropdown align="left" width="w-full">
                                <x-slot name="trigger">
                                <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                                    <span>Select Unit</span>
                                    <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Select Unit</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Management Information System Unit</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Technical Operations</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Finance and Administrative Services</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Project Management Unit</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Human Resources</button>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-600">
                            Tag Personnel <span class="text-red-500">*</span>
                        </label>
                        <x-dropdown align="left" width="w-full">
                                <x-slot name="trigger">
                                <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                                    <span>Select Personnel</span>
                                    <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Select Personnel</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Pedro Mortega</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Gian Russel Villegas</button>
                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Cidreck Gaming</button>
                            </x-slot>
                        </x-dropdown>
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
                        class="fbg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue block w-full p-3 resize-none flex-grow min-h-[120px]"></textarea>
            </div>
        </div>
</div>
