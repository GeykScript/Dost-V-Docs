
<div class="overflow-hidden">
    <div class="grid grid-cols-12 mb-4 gap-2">
        <!-- per page dropdown -->
        <div class="col-span-3 md:col-span-4 flex items-center order-3 mt-3 md:mt-0 md:order-1  ">
                <div class="flex gap-4 items-center">
                    <div
                        x-data="{ open: false, selected: @entangle('perPage') }"
                        class=" w-16 ">
                        <!-- Dropdown button -->
                        <button
                            @click="open = !open"
                            type="button"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-gray-500 focus:border-2 focus:border-brand-blue  w-full p-2.5 
                                    flex justify-between items-center">
                            <span x-text="selected"></span>
                            <x-heroicon-s-chevron-down class="w-4 h-4" />
                        </button>
                        <!-- Dropdown menu -->
                        <ul
                            x-show="open"
                            @click.outside="open = false"
                            x-cloak
                            class="absolute w-16 mt-1  bg-white border border-gray-300 rounded-lg shadow-lg">
                            @foreach ([5, 10, 20, 50, 100] as $value)
                            <li
                                @click="selected = {{ $value }}; $wire.set('perPage', {{ $value }}); open = false"
                                class="cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-brand-blue hover:text-white transition"
                                :class="{ 'bg-gray-800 text-white': selected == {{ $value }} }">
                                {{ $value }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Label -->
                    <p class="text-sm font-medium text-gray-900 md:block hidden">
                        entries per page
                    </p>
                </div>
        </div>
            <!-- search input  -->
            <div class="col-span-9 md:col-span-4 w-full flex flex-col gap-0.5 order-4 md:order-2 ">
                <label class="text-xs font-bold text-gray-500 ">Search</label>
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    name="search"
                    class="w-full h-full focus:outline-none focus:ring-0 text-sm text-gray-900 placeholder:text-gray-500 border border-gray-300 rounded-lg px-3 focus-within:ring-1 focus-within:ring-sky-500 focus-within:border-sky-500"
                    required />
            </div>
            <!-- YEAR FILTER -->
            <div class="col-span-6 md:col-span-2 flex flex-col gap-0.5 order-1 md:order-3">
                    <label class="text-xs font-bold text-gray-500 ">Filter by Year</label>
                    <select  class=" border border-gray-300 text-sm rounded-lg w-full h-full p-2 text-gray-400 focus:outline-none">
                        <option value="">Select Year</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
            </div> 
            <!-- STATUS FILTER -->
            <div class="col-span-6 md:col-span-2 flex flex-col gap-0.5 order-2 md:order-4">
                    <label class="text-xs font-bold text-gray-500 ">Filter by Status</label>
                    <select class="bg-white border border-gray-300 text-sm rounded-lg w-full h-full p-2 text-gray-400 focus:outline-none">
                        <option value="">Select Status</option>
                        <option value="draft">Draft</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                    </select>
            </div> 
    </div>

    <!-- Document Table  -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-500 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3" >Ref No.</th>
                    <th class="px-6 py-3">Document Name</th>
                    <th class="px-6 py-3">Action</th>
                    <th class="px-6 py-3" >Unit Source</th>
                    <th class="px-6 py-3" >Status</th>
                    <th class="px-6 py-3" >Priority Level</th>
                    <th class="px-6 py-3" >Deadline</th>
                </tr>
            </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($documents as $document)
                            <tr class="hover:bg-gray-100/50 transition-colors cursor-pointer"
                                onclick="window.location='{{ route('need-response.view', $document->id) }}'">
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $document->reference_number }}</td>
                                <td class="px-6 py-4 font-medium text-gray-700 truncate max-w-xs">{{ $document->document_name }}</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">For Signature</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">MIS</td>
                                <td class="px-6 py-4 text-gray-700 font-medium text-xs">
                                    <span class="bg-yellow-100 text-yellow-500 py-0.5 px-3 rounded-lg">On Going</span>
                                </td>
                                <td class="px-6 py-4 text-gray-700 font-medium text-xs">
                                    <span class="bg-red-100 text-red-500 py-0.5 px-3 rounded-lg">Express</span>
                                </td>
                                <td class="px-6 py-4 text-gray-700 font-medium">
                                    {{ optional($document->deadline)->format('F j, Y, g:i A') ?? 'Not updated' }}
                                </td>
                            </tr>
                    @empty
                            <tr>
                                <td colspan="7" class="text-center py-10 text-gray-500">
                                    No units found.
                                </td>
                            </tr>
                    @endforelse
                </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $documents->links('pagination::custom-pagination-links') }}
    </div>
</div>