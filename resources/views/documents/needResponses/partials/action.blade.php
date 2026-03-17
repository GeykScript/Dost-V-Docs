<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 lg:p-8 col-span-1 lg:col-span-5">
    
    <div class="flex items-center gap-2 mb-6 w-full">
        <h2 class="text-lg font-bold text-gray-700">Document Actions</h2>
        
        <div class="relative group cursor-pointer flex items-center justify-center">
            <x-heroicon-s-information-circle class="text-gray-500 w-5 h-5"/>
            <div class="absolute top-full left-1/2 -translate-x-1/2 mt-2 hidden group-hover:block w-64 bg-white text-gray-600 text-xs text-justify rounded-lg py-3 px-4 z-10 shadow-xl after:content-[''] after:absolute after:bottom-full after:left-1/2 after:-translate-x-1/2 after:border-4 after:border-transparent after:border-b-white">
                <p class="font-bold mb-1">Tooltip</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
        <!--action details section-->
        <div class="flex flex-col">
            <div class="mb-4">
                <h3 class="text-base font-semibold text-gray-700">Action Details</h3>
            </div>
            
            <div class="space-y-4 flex-grow flex flex-col">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-600">Actions<span class="text-red-500">*</span></label>
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
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-600">File Upload</label>
                        <input type="file" class="w-full text-xs text-gray-700 focus:outline-none" />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-600">File Link</label>
                        <x-text-input 
                            id="file_link" 
                            class="block w-full bg-white border-gray-200 text-gray-700 text-sm rounded-lg p-2"
                            type="text"
                            placeholder="https://gdrive/MOA.pdf"
                        />
                    </div>
                </div>

                <div class="flex-grow flex flex-col">
                    <label class="block mb-2 text-sm font-medium text-gray-600">Remarks:</label>
                    <textarea class="bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue block w-full p-3 resize-none flex-grow min-h-[120px]"></textarea>
                </div>
            </div>
        </div>

        <!--Tagging Section-->
        <div class="flex flex-col">
            <div class="mb-4 flex items-baseline gap-2">
                <h3 class="text-base font-semibold text-gray-700">Tag to Another Personnel</h3>
                <span class="text-sm text-gray-400 font-normal">(Optional)</span>
            </div>

            <div class="space-y-4 flex-grow flex flex-col">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-600">Tag Unit</label>
                        <x-dropdown align="left" width="w-full">
                            <x-slot name="trigger">
                                <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                                    <span class="truncate pr-2">Management Information System Un...</span>
                                    <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400 shrink-0" />
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Management Information System Unit</button>
                                <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Human Resources</button>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-600">Personnel</label>
                        <x-dropdown align="left" width="w-full">
                            <x-slot name="trigger">
                                <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue p-2.5 hover:bg-gray-50 transition-colors">
                                    <span class="truncate pr-2">Juan De la Cruz</span>
                                    <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400 shrink-0" />
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Juan De la Cruz</button>
                                <button type="button" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 transition-colors">Maria Clara</button>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>

                <div class="flex-grow flex flex-col">
                    <label class="block text-sm font-medium text-gray-600 mb-2">Tags:</label>
                    <div class="bg-white border border-gray-200 rounded-lg p-3 flex-grow flex items-start gap-2 flex-wrap cursor-text min-h-[120px]">
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
            </div>
        </div>
    </div>

    <hr class="my-8 border-gray-100" />

    <div class="flex justify-end items-center gap-6">
        <button type="button" class="text-sm font-medium text-gray-400 hover:text-gray-600 transition-colors">
            Clear
        </button>
        <button type="submit" class="bg-[#d4f1f9] text-[#00a3cc] font-bold py-2.5 px-10 rounded-lg text-sm hover:bg-[#bce6f2] transition-colors">
            Submit
        </button>
    </div>

</div>