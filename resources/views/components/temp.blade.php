<div class="relative h-screen">
    <!-- Sidebar -->
     <div 
        x-show="$store.sidebar.open" 
        @click="$store.sidebar.close()"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 xl:hidden"
        style="display: none;">
    </div>
    <div class="fixed xl:relative xl:translate-x-0 inset-y-0 left-0 z-50 xl:z-0 w-60 border-r border-gray-200 bg-sidebar-bg text-white flex flex-col pt-4 min-h-screen transform transition-transform duration-300 ease-in-out lg:flex">        
        <div class="flex items-center justify-between px-4 pb-3">
        <div class="flex items-center"> 
            <h1 class="font-bold italic text-xl lg:text-3xl leading-none">
                <span class="text-brand-dark-blue whitespace-nowraptransition-transform duration-300">
                    D
                </span>
                <span class="text-white whitespace-nowrap transition-transform duration-300">
                    OCS
                </span>
            </h1>
        </div>

        <button  class="text-gray-400 hover:text-gray-500 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <ul class="flex-1 text-sm px-3">
        <!-- Dashboard -->
        <li class="flex items-center group">
            <a href="#"
                class="flex items-center w-full py-3 pl-4 rounded-lg hover:bg-white/10 transition-colors"
                >                
                <span class="ml-3 whitespace-nowrap transition-all duration-200 text-fluid-sm">
                    Dashboard
                </span>
            </a>
        </li>
    </div>
</div>
