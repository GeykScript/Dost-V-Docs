<div x-data="sideMenu()" class="relative">
    <!-- Backdrop overlay for mobile (only visible when sidebar is open) -->
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

    <!-- Sidebar -->
    <div         
        :class="$store.sidebar.open ? 'translate-x-0' : '-translate-x-full' "
        class="fixed xl:relative xl:translate-x-0 inset-y-0 left-0 z-50 xl:z-0 w-60 border-r border-gray-200 bg-sidebar-bg text-white flex flex-col pt-4 min-h-screen transform transition-transform duration-300 ease-in-out lg:flex">        

        <div class="flex items-center justify-between px-4 pb-3">
        
            <div class="flex flex-col items-start gap-1"> 
                <h1 class="font-bold italic text-xl lg:text-3xl leading-none text-brand-dark-blue whitespace-nowrap transition-transform duration-300">
                    D<span class="text-white whitespace-nowrap transition-transform duration-300">OCS
                    </span>
                </h1>
                <p class="text-[9px] text-white font-medium">Document Operations Communication System</p>
            </div>

            <button @click="$store.sidebar.close()" class="text-gray-400 hover:text-gray-500 focus:outline-none lg:hidden">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <ul class="flex-1 min-h-0 text-fluid-sm xl3:text-sm overflow-y-auto mt-6">
            <!-- Dashboard -->
            <li class="flex items-start group">
                <a href="#"
                    class="flex items-center w-full py-3 pl-4 hover:bg-white/10 transition-colors"
                    :class="{
                        'bg-brand-blue/30 text-f7 font-semibold': activeItem === 'dashboard',
                        'text-brand-blue': activeItem !== 'dashboard'
                    }"
                    @click="setActive('dashboard'); if (window.innerWidth < 1280) $store.sidebar.close()">
                    <svg class="flex-shrink-0 w-4 h-4"
                        :class="{
                            'text-brand-blue': activeItem === 'dashboard',
                            'text-gray-200': activeItem !== 'dashboard'
                        }"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13 12C13 11.4477 13.4477 11 14 11H19C19.5523 11 20 11.4477 20 12V19C20 19.5523 19.5523 20 19 20H14C13.4477 20 13 19.5523 13 19V12Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path
                            d="M4 5C4 4.44772 4.44772 4 5 4H9C9.55228 4 10 4.44772 10 5V12C10 12.5523 9.55228 13 9 13H5C4.44772 13 4 12.5523 4 12V5Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path
                            d="M4 17C4 16.4477 4.44772 16 5 16H9C9.55228 16 10 16.4477 10 17V19C10 19.5523 9.55228 20 9 20H5C4.44772 20 4 19.5523 4 19V17Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path
                            d="M13 5C13 4.44772 13.4477 4 14 4H19C19.5523 4 20 4.44772 20 5V7C20 7.55228 19.5523 8 19 8H14C13.4477 8 13 7.55228 13 7V5Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span class="ml-3 whitespace-nowrap transition-all duration-200 text-sm"
                        :class="{
                            'font-semibold text-brand-blue': activeItem === 'dashboard',
                            'text-gray-200': activeItem !== 'dashboard'
                        }">
                        Dashboard
                    </span>
                </a>
            </li>
            
            <!-- Document Management -->
            <p class="text-xs mt-2 mb-2 ml-3 font-500">Document Management</p>
            
            <li class="flex items-center group">
                <a href="#"
                    class="flex items-center w-full py-3 pl-4 hover:bg-white/10 transition-colors"
                    :class="{
                        'bg-nav_active text-f7 font-semibold': activeItem === 'needresponse'',
                        'text-mainblue': activeItem !== 'needresponse''
                    }"
                    @click="setActive('residents'); if (window.innerWidth < 1280) $store.sidebar.close()">
                    <x-heroicon-s-tag class="w-4 h-4" />
                    <span class="ml-3 whitespace-nowrap transition-all duration-200 text-main_font text-sm"
                        :class="{
                            'font-semibold text-mainblue': activeItem === 'needresponse'
                        }">
                        Need Response
                    </span>
                </a>
            </li>

             <li class="flex items-center group">
                <a href="#"
                    class="flex items-center w-full py-3 pl-4 hover:bg-white/10 transition-colors"
                    :class="{
                        'bg-nav_active text-f7 font-semibold': activeItem === 'residents',
                        'text-mainblue': activeItem !== 'residents'
                    }"
                    @click="setActive('residents'); if (window.innerWidth < 1280) $store.sidebar.close()">
                    <x-heroicon-s-document-plus class="w-4 h-4" />
                    <span class="ml-3 whitespace-nowrap transition-all duration-200 text-main_font text-sm"
                        :class="{
                            'font-semibold text-mainblue': activeItem === 'residents'
                        }">
                        Create Document
                    </span>
                </a>
            </li>
           
            <li class="flex items-center group">
                <a href="#"
                    class="flex items-center w-full py-3 pl-4 hover:bg-white/10 transition-colors"
                    :class="{
                        'bg-nav_active text-f7 font-semibold': activeItem === 'residents',
                        'text-mainblue': activeItem !== 'residents'
                    }"
                    @click="setActive('residents'); if (window.innerWidth < 1280) $store.sidebar.close()">
                    <x-heroicon-s-document-text class="w-4 h-4" />
                    <span class="ml-3 whitespace-nowrap transition-all duration-200 text-main_font text-sm"
                        :class="{
                            'font-semibold text-mainblue': activeItem === 'residents'
                        }">
                        My Documents
                    </span>
                </a>
            </li>
            <!-- Users and Groups -->
            <div>
                <p class="text-xs mt-2 mb-2 ml-3 font-500">Users & Groups</p>
                
                <li class="flex items-center group">
                    <a href="#"
                        class="flex items-center w-full py-3 pl-4 hover:bg-white/10 transition-colors"
                        :class="{
                            'bg-nav_active text-f7 font-semibold': activeItem === 'residents',
                            'text-mainblue': activeItem !== 'residents'
                        }"
                        @click="setActive('residents'); if (window.innerWidth < 1280) $store.sidebar.close()">
                        <x-heroicon-s-user-group class="w-4 h-4" />
                        <span class="ml-3 whitespace-nowrap transition-all duration-200 text-main_font text-sm"
                            :class="{
                                'font-semibold text-mainblue': activeItem === 'residents'
                            }">
                            Accounts
                        </span>
                    </a>
                </li>

                <li class="flex items-center group">
                    <a href="#"
                        class="flex items-center w-full py-3 pl-4 hover:bg-white/10 transition-colors"
                        :class="{
                            'bg-nav_active text-f7 font-semibold': activeItem === 'residents',
                            'text-mainblue': activeItem !== 'residents'
                        }"
                        @click="setActive('residents'); if (window.innerWidth < 1280) $store.sidebar.close()">
                        <x-heroicon-s-document-text class="w-4 h-4" />
                        <span class="ml-3 whitespace-nowrap transition-all duration-200 text-main_font text-sm"
                            :class="{
                                'font-semibold text-mainblue': activeItem === 'residents'
                            }">
                            Units
                        </span>
                    </a>
                </li>
            </div>

            <!--Document Setup-->
            <div>
                <p class="text-xs mt-2 mb-2 ml-3 font-500">Document Setup</p>

                <li class="flex items-center group">
                    <a href="#"
                        class="flex items-center w-full py-3 pl-4 hover:bg-white/10 transition-colors"
                        :class="{
                            'bg-nav_active text-f7 font-semibold': activeItem === 'residents',
                            'text-mainblue': activeItem !== 'residents'
                        }"
                        @click="setActive('residents'); if (window.innerWidth < 1280) $store.sidebar.close()">
                        <x-heroicon-s-document-text class="w-4 h-4" />
                        <span class="ml-3 whitespace-nowrap transition-all duration-200 text-main_font text-sm"
                            :class="{
                                'font-semibold text-mainblue': activeItem === 'residents'
                            }">
                            Units
                        </span>
                    </a>
                </li>
            </div>
        </ul>

    </div>
</div>

<script>
    function sideMenu() {
        return {
            activeItem: localStorage.getItem('activeMenuItem') || 'dashboard',
            
            setActive(item) {
                this.activeItem = item;
                localStorage.setItem('activeMenuItem', item);
            }
        }
    }
</script>
