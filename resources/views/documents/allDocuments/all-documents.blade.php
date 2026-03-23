<x-app-layout>
  @section('title', 'All Documents')
     <!-- Title section -->
      <div class="min-h-screen w-full">
        <div class="p-4 md:p-6 ">
            <div class="bg-white rounded-xl p-4 sm:p-6 md:p-8 lg:p-10 shadow-sm">

                <!-- Header -->
              <div class="flex items-center gap-3 mb-2">
                  <div class="bg-purple-50 p-2 rounded-lg">
                      <x-heroicon-o-clipboard-document-list class="w-5 h-5 text-purple-600" />
                  </div>
                  <div>
                      <h1 class="text-xl font-bold text-gray-700">All Documents</h1>
                      <p class="text-xs text-gray-400 font-medium">Central Repository of Records</p>
                  </div>
              </div>
                  <div class="overflow-x-auto mt-4">
                    <livewire:all-documents-table />
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
