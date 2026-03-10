<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Unit;

new class extends Component
{
    public $users = [];
    public $search = '';

    public function render()
    {
        $this->users = User::with('unit')
            ->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return <<<'blade'
            <div>

                <div class="mt-6 mb-5 flex flex-col gap-4 md:flex-row md:justify-between md:items-center">

                    <div class="flex items-center gap-2">
                        <select class="border border-[#cecece] py-2 px-3 rounded-md w-20">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                        <span class="text-sm text-[#858282] whitespace-nowrap">
                            entries per page
                        </span>
                </div>

                
                    <div class="flex flex-col sm:flex-row gap-2 sm:items-center">

                        <input 
                            type="text"
                            wire:model.live="search"
                            placeholder="Search..."
                            class="border border-[#cecece] py-2 px-3 w-full sm:w-[200px] rounded-md"
                        >

                        <select class="border border-[#cecece] py-2 px-3 w-full sm:w-[150px] rounded-md">
                            <option disabled selected>
                                Sort by
                            </option>
                        </select>

                        <button class="text-white bg-[#00AEEF] flex items-center justify-center gap-2 py-2 px-4 rounded-md font-semibold hover:bg-[#03A4DF] whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z"/>
                            </svg>
                            Add User
                        </button>

                    </div>

                </div>

            
                <div class="overflow-x-auto">

                    <table class="w-full border border-gray-200 min-w-[700px]">
                        <thead class="border-b bg-[#F3F5F6]">
                            <tr>
                                <th class="py-3 px-5 text-left">User ID</th>
                                <th class="py-3 px-5 text-left">Username</th>
                                <th class="py-3 px-5 text-left">Name</th>
                                <th class="py-3 px-5 text-left">Unit</th>
                                <th class="py-3 px-5 text-left">Position</th>
                                <th class="py-3 px-5 text-left">Created at</th>  
                            </tr>
                        </thead>
                                    
                        <tbody>
                            @forelse($users as $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-5">{{$user->id ?? 'N/A'}}</td>
                                    <td class="py-2 px-5">{{$user->username ?? 'N/A'}}</td>
                                    <td class="py-2 px-5">{{$user->first_name ?? 'N/A'}} {{$user->last_name ?? 'N/A'}}</td>
                                    <td class="py-2 px-5">{{$user->unit->unit_name ?? 'N/A'}}</td>
                                    <td class="py-2 px-5">{{$user->unit->position ?? 'N/A'}}</td>
                                    <td class="py-2 px-5">{{$user->created_at ?? 'N/A'}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">
                                        No units found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            <div class="mt-4"></div>

        </div>


        blade;
    }
};
?>

