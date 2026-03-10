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
        class="fixed xl:relative xl:translate-x-0 inset-y-0 left-0 z-50 xl:z-0 w-60   bg-sidebar-bg text-white flex flex-col pt-2 min-h-screen transform transition-transform duration-300 ease-in-out lg:flex">        

        <div class="flex items-center justify-center ">
        
            <div class="flex flex-col justify-center ">
                    <h1 class="text-3xl text-white font-black italic leading-tight tracking-tight"> <span class="text-brand-dark-blue">D</span>OCS</h1>
                    <h3 class="font-medium text-white text-[9px]  leading-none tracking-tight"><span class="text-brand-dark-blue ">Document</span> Operation Communication System</h3>
                </div>
            <!-- Close button on mobile  -->
            <button @click="$store.sidebar.close()" class="text-gray-400 hover:text-gray-500 focus:outline-none lg:hidden">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <ul class="flex-1 min-h-0 text-fluid-sm xl3:text-sm overflow-y-auto mt-6">
            <!-- Dashboard -->
            <li class="flex items-start group">
                <a href="#"
                    class="flex items-center w-full py-3 pl-4 transition-colors"
                    x-bind:class="{
                        'bg-brand-blue/20 text-f7 font-semibold': activeItem === 'dashboard',
                        'text-brand-blue': activeItem !== 'dashboard'
                    }"
                    @click="setActive('dashboard'); if (window.innerWidth < 1280) $store.sidebar.close()">

                    <x-heroicon-s-squares-2x2
                        x-bind:class="{
                            'text-brand-blue w-4 h-4': activeItem === 'dashboard',
                            'text-gray-200 w-4 h-4': activeItem !== 'dashboard'
                        }"
                    />

                    <span class="ml-3 whitespace-nowrap transition-all duration-200 text-sm"
                        x-bind:class="{
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
                    <x-heroicon-s-plus class="w-4 h-4" />
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
                        <x-heroicon-s-building-office class="w-4 h-4" />
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
                            'bg-nav_active text-f7 font-semibold': activeItem === 'action',
                            'text-mainblue': activeItem !== 'action'
                        }"
                        @click="setActive('action'); if (window.innerWidth < 1280) $store.sidebar.close()">
                        <x-heroicon-o-document-plus class="w-4 h-4" />
                        <span class="ml-3 whitespace-nowrap transition-all duration-200 text-main_font text-sm"
                            :class="{
                                'font-semibold text-mainblue': activeItem === 'action'
                            }">
                            Action
                        </span>
                    </a>
                </li>
                <li class="flex items-center group">
                    <a href="#"
                        class="flex items-center w-full py-3 pl-4 hover:bg-white/10 transition-colors"
                        :class="{
                            'bg-nav_active text-f7 font-semibold': activeItem === 'action',
                            'text-mainblue': activeItem !== 'action'
                        }"
                        @click="setActive('action'); if (window.innerWidth < 1280) $store.sidebar.close()">
                        <x-heroicon-o-document-duplicate class="w-4 h-4" />
                        <span class="ml-3 whitespace-nowrap transition-all duration-200 text-main_font text-sm"
                            :class="{
                                'font-semibold text-mainblue': activeItem === 'action'
                            }">
                            Type
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
