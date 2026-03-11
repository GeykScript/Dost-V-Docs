<x-app-layout>


    <div class="p-6">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                
            <div class="flex items-center gap-2">
                <div class="bg-gray-200 p-2 rounded-lg">
                    <x-heroicon-s-document-text class="w-4 h-4 text-gray-600" />
                </div>
                <div class="flex flex-col leading-none">
                    <h1 class="text-gray-700 font-semibold text-lg">Need Responses</h1>
                    <p class="text-gray-600 font-medium text-xs">Documents routed to the user</p>
                </div>
                
            </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-100 text-gray-500 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-6 py-3">ref no.</th>
                            <th class="px-6 py-3">document name</th>
                            <th class="px-6 py-3">action</th>
                            <th class="px-6 py-3">Unit source</th>
                            <th class="px-6 py-3">status</th>
                            <th class="px-6 py-3">priority level</th>
                            <th class="px-6 py-3">deadline</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer">
                            <td class="px-6 py-4 font-medium text-gray-800">2022-0505-0011</td>
                            <td class="px-6 py-4 font-medium text-gray-700">Memorandum of Agreement for Bic...</td>
                            <td class="px-6 py-4 text-gray-700 font-medium">For signature</td>
                            <td class="px-6 py-4 text-gray-700 font-medium">MIS</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-600">
                                        Completed
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-600">
                                        Express
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 font-medium">Sep 01, 2025</td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer">
                            <td class="px-6 py-4 font-medium text-gray-800">2022-0505-0012</td>
                            <td class="px-6 py-4 font-medium text-gray-700">Memorandum of Agreement for Bic...</td>
                            <td class="px-6 py-4 text-gray-700 font-medium">For signature</td>
                            <td class="px-6 py-4 text-gray-700 font-medium">MIS</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-600">
                                        Completed
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-600">
                                        Routinary
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 font-medium">Sep 01, 2025</td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer">
                            <td class="px-6 py-4 font-medium text-gray-800">2022-0505-0013</td>
                            <td class="px-6 py-4 font-medium text-gray-700">Memorandum of Agreement for Bic...</td>
                            <td class="px-6 py-4 text-gray-700 font-medium">For dissemination/td>
                            <td class="px-6 py-4 text-gray-700 font-medium">MIS</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-600">
                                        Ongoing
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-600">
                                        Express
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 font-medium">Sep 01, 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>