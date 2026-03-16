<div class="overflow-hidden">
    <div class="grid grid-cols-12 mb-4 gap-2">
        <!-- per page dropdown -->
        <div class="col-span-12 md:col-span-6 order-2 md:order-1">
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
        <div class="col-span-12 md:col-span-6 grid grid-cols-6 gap-2 order-1 md:order-2">
            <!-- search input  -->
            <div class="col-span-4 md:col-span-4  flex flex-col items-center justify-center">
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    name="search"
                    class="w-full h-full focus:outline-none focus:ring-0 text-sm text-gray-900 placeholder:text-gray-500 border border-gray-300 rounded-lg px-3 focus-within:ring-1 focus-within:ring-sky-500 focus-within:border-sky-500"
                    placeholder="Search"
                    required />
            </div>  
            <!-- Add Unit Button -->
            <div class="col-span-2 md:col-span-2 flex items-center justify-center">
                <a href="{{ route('accounts.add') }}" class="bg-brand-blue text-white  text-sm md:text-md h-full w-full rounded-lg flex items-center justify-center gap-2 font-semibold"><span><x-heroicon-s-plus class="w-4 h-4" /></span>Add User</a>
            </div>     
        </div>
    </div>

    <!-- Unit Table  -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-500 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3">Username</th>
                    <th class="px-6 py-3">First Name</th>
                    <th class="px-6 py-3">Last Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Created At</th>
                    <th class="px-6 py-3">Action</th>
                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($users as $user)
                     <tr class="hover:bg-gray-100/50 transition-colors ">
                        <td class="px-6 py-4 font-medium text-gray-700 truncate max-w-xs">{{ $user->username }}</td>
                        <td class="px-6 py-4 text-gray-700 font-medium">{{ $user->first_name }}</td>
                        <td class="px-6 py-4 text-gray-700 font-medium">{{ $user->last_name }}</td>
                        <td class="px-6 py-4 text-gray-700 font-medium truncate max-w-md">{{ $user->email }}</td>
                           <td class="px-6 py-4 text-gray-600 font-medium">
                            {{ $user->created_at->format('F j, Y, g:i A') }}
                        </td> 
                        <td class="px-6 py-4 text-gray-700 font-medium flex gap-2">
                            <a href="{{ route('accounts.edit', $user->id) }}" class=" text-sky-500 hover:text-sky-400 px-3 py-2 rounded-md text-sm flex items-center gap-1 cursor-pointer"><x-heroicon-s-pencil-square class="w-5 h-5" />Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-500">
                            No users found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $users->links('pagination::custom-pagination-links') }}
    </div>
</div>