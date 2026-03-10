<x-app-layout>
    @vite(['resources/js/components/line-graph.js'])
    @section('title', 'Dashboard')
    <div class="p-6">
        <div class="grid grid-cols gap-3">
            <div class="grid grid-cols lg:grid-cols-7 gap-3">
                <div class="cols-span-1 lg:col-span-5 grid grid-rows lg:grid-rows-4 gap-3">
                    <div class="grid grid-cols lg:grid-cols-3 row-span-1 gap-3">
                        <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm transition-shadow">
                            <!--Stats Section-->
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Total Documents</p>
                                    <h3 class="text-3xl font-semibold text-700 mt-1">100</h3>
                                </div>
                                <div class="p-3 bg-sky-100/70 rounded-full">
                                <x-heroicon-s-clipboard-document class="h-5 w-5 text-brand-blue" />
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-xs font-medium text-gray-600">
                                Overall document transactions 
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm transition-shadow">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Ongoing Documents</p>
                                    <h3 class="text-3xl font-semibold text-gray-700 mt-1">12</h3>
                                </div>
                                <div class="p-3 bg-yellow-200/70 rounded-full">
                                <x-heroicon-s-clock class="h-5 w-5 text-yellow-500" />
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-xs font-medium text-gray-600">
                                Documents with pending status 
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm transition-shadow">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Completed Documents</p>
                                    <h3 class="text-3xl font-semibold text-gray-700 mt-1">8</h3>
                                </div>
                                <div class="p-3 bg-green-100/70 rounded-full">
                                <x-heroicon-s-clipboard-document-check class="h-5 w-5 text-green-500" />
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-xs font-medium text-gray-600">
                                Documents that are completed 
                            </div>
                        </div>
                    </div>
                    <div class="row-span-3 bg-white rounded-lg">
                        <!--Linegraph extension-->
                        @include('components.dashboard.dashboard-linegraph')
                    </div>
                </div>
                <!--Progress Overview extension-->
                @include('components.dashboard.progress-overview')
            </div>
            <!--documents table extension-->
            @include('components.dashboard.documents-table')
        </div>
    </div>
   
    <!-- dashboard layout  -->
    
</x-app-layout>