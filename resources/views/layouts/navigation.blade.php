

<!-- Navigation Bar  -->
<nav x-data="{ open: false }" class="bg-brand-blue border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-12">
        <div class="flex justify-between sm:justify-end h-16">
            <!-- Mobile Hamburger Menu  -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="$store.sidebar.toggle()" class="inline-flex items-center justify-center p-2 rounded-md text-white  focus:outline-none  transition duration-150 ease-in-out">
                    <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': $store.sidebar.open, 'inline-flex': !$store.sidebar.open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <!-- Settings Dropdown -->
            <div class="flex sm:gap-10  items-center ">
                    <!-- datetime -->
                    <div id="formattedDate" 
                        data-date="{{ now() }}"  class="hidden sm:flex text-md text-white justify-end items-end  flex-col leading-none ">
                    </div>
                    <!-- notification bar -->
                    <!-- Notification Dropdown -->
                    <x-dropdown align="default" width="60">
                        <x-slot name="trigger">
                            <button class="relative inline-flex items-center p-2 text-white focus:outline-none">
                                <x-heroicon-s-bell class="w-7 h-7" />
                                <span class="absolute top-1 right-1 inline-flex items-center justify-center px-1.5 py-1 text-[9px] font-bold leading-none text-white bg-red-600 rounded-full">
                                    10
                                </span>
                            </button>
                        </x-slot>
                        <!-- Dropdown content  -->
                        <x-slot name="content">
                            <div class="w-[15rem] sm:w-[35rem] max-h-auto overflow-y-auto overflow-hidden p-3">
                                <h2 class="text-lg font-bold px-4 py-2  text-brand-blue">Notifications</h2>
                                    <div class="flex flex-col gap-2">
                                        <div class="px-4 py-2 gap-1 bg-sky-100 cursor-pointer rounded-md">
                                            <div class="flex justify-between">
                                                <p class="text-sm font-semibold text-gray-700">Document Received</p>
                                                <span class="w-2 h-2 bg-sky-400 rounded-full"></span>
                                            </div>
                                            <p class="text-xs text-gray-500">The document Memorandum of agreement has received by Adorable Baby. Document has been routed to Gusion Montefalco.</p>
                                            <p class="text-xs text-gray-500 italic text-right mt-1">Just now</p>
                                        </div>

                                        <div class="px-4 py-2 border-t border-gray-200 gap-1 bg-white cursor-pointer rounded-md">
                                            <p class="text-sm  font-semibold text-gray-700">Document Received</p>
                                            <p class="text-xs text-gray-500">The document Memorandum of agreement has received by Adorable Baby. Document has been routed to Gusion Montefalco.</p>
                                            <p class="text-xs text-gray-500 italic text-right mt-1">2 mins ago</p>
                                        </div>
                                    </div>
                                  
                                <div class="p-2 flex justify-end">
                                    <a href="#" class="text-brand-blue  text-xs hover:underline">
                                        View All
                                    </a>
                                </div>
                            </div>
                        </x-slot>
                    </x-dropdown>
                    

                    <!-- Profile -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex gap-2 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white   focus:outline-none transition ease-in-out duration-150">
                                <x-heroicon-s-user-circle class="w-8 h-8 " />
                                <div class="flex-col items-start justify-start hidden sm:flex">
                                    <div class="flex ">
                                        <h1 class="text-md font-semibold">
                                            {{ Auth::user()->full_name }}
                                        </h1>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- Need to change  -->
                                    <p class="text-[10px]">MIS Unit</p> 
                                </div>
                            </button>
                        </x-slot>
                        <!-- dropdown content  -->
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
            </div>
        </div>
    </div>
</nav>
