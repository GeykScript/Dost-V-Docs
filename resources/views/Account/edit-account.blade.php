<x-app-layout>
@section('title', 'Edit Accounts')

<!-- Account Edit Page  -->
<div class="min-h-screen w-full">
  
 <!-- Profile Section  -->
    <div class="p-4 sm:p-6">
        <div class="p-2">
            <a href="{{ route("accounts") }}" class="text-gray-500 font-semibold hover:text-gray-600">
                <x-heroicon-s-arrow-uturn-left class="w-5 h-5 inline-block text-gray-500 hover:gray-600 font-bold "/>
                Return
            </a>
        </div>
        <div class="max-w-7xl grid grid-cols-3 gap-3">
            <div class="col-span-3 md:col-span-1  flex flex-col gap-3">
                <div class="bg-white shadow-sm rounded-lg">
                    <!-- Banner -->
                    <img src="{{ asset('logo/dost_banner1.png') }}" alt="DOST Banner" class="shadow-md rounded-t-lg ">
                    <!-- Profile Details -->
                    <div class="relative flex flex-col justify-center items-center" >
                        <div class="bg-white rounded-full  absolute flex -top-5 md:-top-5  p-0 m-0">
                            <x-heroicon-s-user-circle class="w-24 h-24  rounded-full border border-white text-brand-blue" />
                        </div>
                            <!-- Profile Info -->
                        <div class=" h-auto pb-8 mt-20 md:mt-20 flex flex-col justify-center items-center ">
                            <h2 class="text-lg md:text-xl font-bold text-gray-600">{{ $user->full_name }}</h2>
                            <p class="flex items-center font-medium text-gray-500 text-xs  md:text-lg">{{ $user->username }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-sm rounded-lg p-6 ">
                     @include('Account.update-password-form')
                </div>
            </div>
            <div class="col-span-3 md:col-span-2 bg-white shadow-sm rounded-lg flex flex-col">

                <div>
                    @include('Account.update-info-form')
                </div>
            </div>
        </div>
    </div>
        <footer class="text-xs text-gray-600  text-center p-4">
        © 2026 All rights reserved | Developed by Department of Science and Technology - Regional Office V - Management Information Services Unit
    </footer>
</div>


</x-app-layout>