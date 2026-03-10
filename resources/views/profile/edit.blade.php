<x-app-layout>
    

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto px-4 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg">
                <!-- Banner -->
                <img src="{{ asset('logo/dost_banner1.png') }}" alt="DOST Banner" class="shadow-md rounded-t-lg ">
                <!-- Profile Details -->
            <div class="relative flex">
                <div class="bg-white rounded-full  absolute flex -top-5 md:-top-10 left-6 p-0 m-0">
                    <x-heroicon-s-user-circle class="w-24 h-24 md:w-40 md:h-40 rounded-full border border-white text-brand-blue" />
                </div>
                    <!-- Profile Info -->
                <div class="ml-32 md:ml-48 h-auto pb-12  mt-2 md:mt-5 flex flex-col ">
                    <h2 class="text-xl md:text-2xl font-bold text-gray-700">John E. Doe</h2>
                    <p class="flex items-center text-gray-500 mt-1  text-xs sm:text-sm md:text-sm">
                        <x-heroicon-s-building-office class="w-3 h-3 md:w-5 md:h-5 mr-1" />
                        MIS - Management Information System
                    </p>
                    <p class="flex items-center text-gray-500 text-xs sm:text-sm md:text-sm">
                        <x-heroicon-s-briefcase class="w-3 h-3 md:w-5 md:h-5  mr-1" />
                        Unit Head
                    </p>
                </div>
            </div>


</div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
