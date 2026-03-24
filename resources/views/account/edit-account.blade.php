<x-app-layout>
@section('title', 'Edit Account')

<div class="min-h-screen w-full">
  
    <div class="p-4 sm:p-6">
        
        <div class="max-w-full mx-auto w-full flex flex-col gap-4">
            
            <div class="pb-4">
                <a href="{{ route('accounts') }}" class="text-gray-500 font-semibold hover:text-gray-600 flex items-center gap-1 w-fit">
                    <x-heroicon-s-arrow-uturn-left class="w-5 h-5 font-bold "/>
                    Return
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                
                <div class="col-span-1 flex flex-col gap-4">
                    <div class="bg-white shadow-sm rounded-lg">
                        <img src="{{ asset('logo/dost_banner1.png') }}" alt="DOST Banner" class="w-full object-cover shadow-sm rounded-t-lg h-24 sm:h-32">
                        
                        <div class="relative flex flex-col justify-center items-center">
                            <div class="bg-white rounded-full absolute flex -top-12 p-1 m-0">
                                <x-heroicon-s-user-circle class="w-24 h-24 rounded-full border border-white text-brand-blue bg-white" />
                            </div>
                            <div class="h-auto pb-8 mt-14 flex flex-col justify-center items-center">
                                <h2 class="text-lg md:text-xl font-bold text-gray-700">{{ $user->full_name }}</h2>
                                <p class="flex items-center font-medium text-gray-500 text-xs md:text-sm">{{ $user->username }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-sm rounded-lg p-4">
                        @include('account.partials.update-password-form')
                    </div>
                </div>
                
                <div class="col-span-1 md:col-span-2 bg-white shadow-sm rounded-lg flex flex-col">
                    <div>
                        @include('account.partials.update-info-form')
                    </div>
                </div>
                
            </div>
            <div class="rounded-lg bg-white p-6">
                <livewire:admin.user-assignments-table :user="$user" />
            </div>
            
        </div>
    </div>
    
    <footer class="text-xs text-gray-500 text-center p-4">
        © 2026 All rights reserved | Developed by Department of Science and Technology - Regional Office V - Management Information Services Unit
    </footer>
</div>

</x-app-layout>