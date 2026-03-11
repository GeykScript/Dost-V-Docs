<x-app-layout>
@section('page-id', 'units')
@section('title', 'Units')
<div class="min-h-screen w-full">
    <div class="p-4 sm:p-6 md:p-8 lg:p-10">
        <div class="bg-white rounded-xl p-4 sm:p-6 md:p-8 lg:p-10 shadow-sm">

            <!-- Header -->
            <div class="flex sm:flex-row sm:items-center gap-3 mb-6">
                
                <span class="flex items-center justify-center rounded-md px-3 py-2 bg-[#E9E9E9] w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd">
                            <path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018"/>
                            <path fill="currentColor" d="M15 6a3 3 0 0 1-2 2.83V11h3a3 3 0 0 1 3 3v1.17a3.001 3.001 0 1 1-2 0V14a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v1.17a3.001 3.001 0 1 1-2 0V14a3 3 0 0 1 3-3h3V8.83A3.001 3.001 0 1 1 15 6"/>
                        </g>
                    </svg>
                </span>

                <h2 class="font-bold pt-1 text-center text-xl sm:text-2xl">
                    Unit Management
                </h2>

            </div>

           
            <div class="overflow-x-auto">
                <livewire:unit-table/>
            </div>

        </div>
    </div>
</div>


</x-app-layout>