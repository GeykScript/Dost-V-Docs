<x-app-layout>
@section('title', 'Need Responses')
<div class="min-h-screen w-full">
    <div class="p-4 md:p-6 ">
        <div class="bg-white rounded-xl p-4 sm:p-6 md:p-8 lg:p-10 shadow-sm">

            <!-- Header -->
        <div class="flex items-center gap-3 mb-2">
            <div class="bg-gray-100 p-2 rounded-lg">
                <x-heroicon-s-tag class="w-5 h-5 text-gray-600" />
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-700">Need Response</h1>
                    <p class="text-xs text-gray-400 font-medium">Documents needing user response</p>
            </div>
        </div>           
            <div class="overflow-x-auto mt-4">
                    <livewire:need-response-table />
            </div>
        </div>
    </div>
</div>


</x-app-layout>
