<x-app-layout>
@section('title', 'Types')
<div class="min-h-screen w-full">
    <div class="p-4 md:p-6 ">
        <div class="bg-white rounded-xl p-4 sm:p-6 md:p-8 lg:p-10 shadow-sm">

            <!-- Header -->
        <div class="flex items-center gap-3 mb-2">
            <div class="bg-gray-100 p-2 rounded-lg">
                <x-heroicon-s-document-duplicate class="w-5 h-5 text-gray-600" />
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-700">Document Types List</h1>
                <p class="text-xs text-gray-400 font-medium">List of Types for Documents</p>

            </div>
        </div>           
            <div class="overflow-x-auto mt-4">
                    <livewire:types-table />
            </div>
        </div>
    </div>
</div>


</x-app-layout>