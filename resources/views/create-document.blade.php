<x-app-layout>
    @section('page-id', 'create-document')
    @section('title', 'Create Documents')

    <div class="p-6">
        <div class="bg-white rounded-lg w-full p-10">
            <div class="flex items-center gap-3 mb-2">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <x-heroicon-s-document-plus class="w-5 h-5 text-brand-blue" />
                </div>
                <div>
                    <h1 class="text-xl font-semibold text-brand-blue">Create Document</h1>
                    <p class="text-xs text-gray-400 font-medium">Please fill in all of the required details.</p>
                </div>
            </div>

            <div class="grid grid-cols lg:grid-cols-2 mt-6 gap-10">
                @include('components.create-document.document-information')
                                
                @include('components.create-document.document-actions')
            </div>
        </div>
    </div>
</x-app-layout>