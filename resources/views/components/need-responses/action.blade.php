<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 lg:p-8 max-w-4xl">
    
    <!-- Header with Tooltip -->
    <div class="flex items-center gap-2 mb-6">
        <h2 class="text-lg font-bold text-gray-700">Document Actions</h2>
        
        <!-- Info Icon & Tooltip Container -->
        <div class="relative group cursor-pointer flex items-center justify-center">
            <x-heroicon-s-information-circle class="text-gray-500 w-5 h-5"/>
            
            {{-- Tooltip Content --}}
            <div class="absolute top-full left-1/2 -translate-x-1/2 mt-2 hidden group-hover:block w-64 bg-white text-gray-600 text-xs text-justify rounded-lg py-3 px-4 z-10 shadow-xl after:content-[''] after:absolute after:bottom-full after:left-1/2 after:-translate-x-1/2 after:border-4 after:border-transparent after:border-b-white">
                <p class="font-bold mb-1">Tooltip</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>

    <!-- Actions Dropdown -->
    <div class="mb-8 w-full md:w-[48%]">
        <label class="block mb-2 text-sm font-medium text-gray-600">Actions</label>
        
        <x-dropdown align="left" width="w-full">
            <x-slot name="trigger">
                <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none p-2.5 hover:bg-gray-50 transition-colors">
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

    <!-- Tag Personnel Section -->
    <div class="mb-4 flex items-baseline gap-2">
        <h3 class="text-base font-semibold text-gray-700">Tag to Another Personnel</h3>
        <span class="text-sm text-gray-400 font-normal">(Optional)</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-4">
        {{-- Tag Unit Dropdown (Using x-dropdown) --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">Tag Unit</label>
            <x-dropdown align="left" width="w-full">
                <x-slot name="trigger">
                    <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none p-2.5 hover:bg-gray-50 transition-colors">
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

        <!-- Personnel Dropdown-->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">Personnel</label>
            <x-dropdown align="left" width="w-full">
                <x-slot name="trigger">
                    <button type="button" class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none p-2.5 hover:bg-gray-50 transition-colors">
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

    {{-- Selected Tags Container --}}
    <div class="flex items-center gap-3 mb-8 mt-2">
        <span class="text-sm font-medium text-gray-600">Tags:</span>
        <span class="inline-flex items-center gap-1.5 bg-cyan-100 text-cyan-500 text-xs font-medium px-3 py-1.5 rounded-md">
            Juan Dela Cruz
            <button type="button" class="text-cyan-500 hover:text-cyan-700 focus:outline-none ml-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </span>
    </div>

    <!-- File Upload & Link Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                File Upload <span class="text-gray-400 font-normal">(Optional):</span>
            </label>
            <input type="file" 
                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border border file:border-gray-200 file:text-sm file:font-medium file:bg-white file:text-gray-600 hover:file:bg-gray-50 border-gray-200 rounded-lg cursor-pointer h-[42px] p-[1px]">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                File Link <span class="text-gray-400 font-normal">(Optional) :</span>
            </label>
            <!-- Implementing your reusable component here -->
            <x-text-input 
                id="file_link" 
                class="block w-full bg-white border-gray-200 text-gray-700 text-sm focus:ring-blue-500 rounded-lg p-2.5"
                type="text"
                name="file_link"
                placeholder="https://gdrive//MOA.pdf"
            />
        </div>
    </div>

    <!-- Remarks Section -->
    <div class="mb-8 mt-4">
        <label class="block mb-2 text-sm font-medium text-gray-600">Remarks:</label>
        <textarea rows="3" 
                  class="bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none block w-full p-3 resize-none"></textarea>
    </div>

    {{-- Footer Actions --}}
    <div class="flex justify-end items-center gap-6 mt-4">
        <button type="button" class="text-sm font-medium text-gray-400 hover:text-gray-600 transition-colors">
            Clear
        </button>
        <button type="submit" class="bg-[#d4f1f9] text-[#00a3cc] font-bold py-2.5 px-8 rounded-lg text-sm hover:bg-[#bce6f2] transition-colors">
            Submit
        </button>
    </div>

</div>