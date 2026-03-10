<?php

use Livewire\Component;
use App\Models\Unit;

new class extends Component
{
    public $units = [];
    public $search = '';

    public function render()
    {
        $this->units = Unit::query()
            ->where(function ($query) {
                $query->where('unit_name', 'like', '%' . $this->search . '%')
                    ->orWhere('abbreviation', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->get();

        return <<<'blade'
        <div>
            <div class="mt-10 mb-5 flex justify-between items-center">

                <!-- LEFT -->
                <select class="border border-[#cecece] py-2 px-3 w-[5%] rounded-md">
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>

                <!-- RIGHT -->
                <div class="flex items-center">

                    <input 
                        type="text"
                        wire:model.live="search"
                        placeholder="Search..."
                        class="border border-[#cecece] py-2 px-2 w-[200px] rounded-md mr-3"
                    >

                    <select class="border border-[#cecece] py-2 px-2 w-[150px] rounded-md mr-3">
                        <option disabled selected>
                            Sort by
                        </option>
                    </select>

                    <span class="text-white bg-[#00AEEF] flex items-center gap-2 p-2 rounded-md cursor-pointer font-semibold hover:bg-[#03A4DF]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z"/>
                        </svg>
                        Add Unit
                    </span>

                </div>

            </div>

            
            <table class="w-full border border-1 border-gray ">
                <thead class="border-b border-1 border-gray bg-[#F3F5F6]-20">
                    <tr>
                        <th class="py-2 px-5 text-start">Unit ID</th>
                        <th class="py-2 px-5 text-start">Unit Name</th>
                        <th class="py-2 px-5 text-start">Abbreviation</th>
                        <th class="py-2 px-5 text-start">Description</th>
                        <th class="py-2 px-5 text-start">Created at</th>  
                    </tr>
                </thead>
                            
                <tbody>
                    @forelse($units as $unit)
                        <tr>
                            <td class="py-2 px-5">{{$unit->id ?? 'N/A'}}</td>
                            <td class="py-2 px-5">{{$unit->unit_name ?? 'N/A'}}</td>
                            <td class="py-2 px-5">{{$unit->abbreviation ?? 'N/A'}}</td>
                            <td class="py-2 px-5">{{$unit->description ?? 'N/A'}}</td>
                            <td class="py-2 px-5">{{$unit->created_at ?? 'N/A'}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">
                                No units found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="mt-4">
                <!--insert pagination-->
            </div>


        
        </div>
        blade;   
        }

};
?>


