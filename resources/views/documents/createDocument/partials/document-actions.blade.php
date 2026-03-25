<!--Part 2 - actions section -->
<div class="col-span-1 mt-4">
    <h4 class="text-lg font-semibold text-gray-600 mb-4">Document Actions</h4>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
        <!--Action Selection-->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-600">
                Action <span class="text-red-500">*</span>
            </label>
            <div x-data="{ selectedId: '', selectedName: 'Select Action' }">
                <x-dropdown align="left" width="w-full">
                    
                    <x-slot name="trigger">
                        <button type="button"
                            class="w-full flex justify-between items-center bg-white border border-gray-200 text-gray-500 text-sm rounded-lg p-2.5">
                            
                            <span x-text="selectedName"></span>
                            <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <button type="button"
                            @click="selectedId = ''; selectedName = 'Select Action'"
                            class="block w-full px-4 py-2 text-left text-sm text-gray-500 hover:bg-gray-100">
                            Clear Selection
                        </button>

                        @foreach($actions as $action)
                            <button type="button"
                                @click="selectedId = '{{ $action->id }}'; selectedName = '{{ addslashes($action->action_name) }}'"
                                class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                                {{ $action->action_name }}
                            </button>
                        @endforeach
                    </x-slot>

                </x-dropdown>
            </div>
        </div>

            <!--Deadline-->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-600">
                    Deadline <span class="text-red-500">*</span>
                </label>
                 <input 
                type="date" 
                placeholder="YYYY/MM/DD"
                class="w-full text-sm p-2.5 shadow-none text-gray-700 placeholder:text-gray-300 
                    border border-gray-300 rounded focus:outline-none  focus:ring-sky-400 focus:border-sky-400"
            />

            </div>

            <!--Sender Section -->
            <div class="lg:col-span-2 mt-2">
                <h5 class="text-base font-semibold text-gray-400 mb-4">From</h5>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <x-native-searchable-select 
                            id="unit_source"
                            name="assignment_id" {{-- This is the form input name submitted to your backend --}}
                            label="Unit Source"
                            :required="true"
                            :results="$myUnits"
                            valueField="assignment_id" {{-- Extracts the assignment_id to be the value --}}
                            displayField="unit_name"   {{-- Displays the unit_name as the main text --}}
                            subDisplayField="position" {{-- Bonus: Shows their position (e.g., "Unit Head") as the sub-text! --}}
                            placeholder="Select Unit..."
                        />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-600">
                            Source Personnel</span>
                        </label>
                        <input 
                            type="text" 
                            value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}{{ auth()->user()->suffix ? ' ' . auth()->user()->suffix : '' }}" 
                            readonly 
                            class="bg-gray-100 border-none focus:ring-0 focus:outline-none text-gray-500 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed">
                    </div>
                </div>
            </div>

            @php
                // We prepend "All Units" cleanly on the server side so it's ready instantly on page load.
                $routeUnits = collect([
                    ['id' => 'all', 'unit_name' => 'All Units', 'abbreviation' => 'ALL']
                ])->concat($units);
            @endphp

            <div class="lg:col-span-2 mt-2"
                x-data='{
                    rawUsers: @json($users).map(u => ({...u, full_name: u.first_name + " " + (u.last_name || "")})),
                    rawUnits: @json($units),
                    
                    selectedUnitId: null,
                    selectedUnitName: "",
                    tags: [], 
                    
                    updatePersonnelList(unitId, unitText) {
                        this.selectedUnitId = unitId;
                        this.selectedUnitName = unitText;
                        
                        if (!unitId) {
                            $dispatch("update-items", { name: "route_user_id", items: [] });
                            return;
                        }
                        
                        let filtered = [];
                        if (unitId === "all") {
                            filtered = this.rawUsers;
                        } else {
                            filtered = this.rawUsers.filter(user =>
                                user.active_assignments && 
                                user.active_assignments.some(assignment => String(assignment.unit_id) === String(unitId))
                            );
                        }
                        
                        // Dynamically inject "All Personnel" at the top of the filtered list
                        let finalPersonnelList = [{ id: "all", full_name: "All Personnel" }, ...filtered];
                        
                        $dispatch("update-items", { name: "route_user_id", items: finalPersonnelList });
                    },
                    
                    addTag(userId, userName) {
                        if (!userId || !this.selectedUnitId) return;
                        
                        // Prevent duplicates (cast to Strings just to be safe)
                        let exists = this.tags.some(tag => String(tag.userId) === String(userId) && String(tag.unitId) === String(this.selectedUnitId));
                        if (exists) return;
                        
                        // Format the display name (e.g., "All Personnel (MISU)" or just the user name)
                        let displayName = userName;
                        if (userId === "all") {
                            let u = this.rawUnits.find(u => String(u.id) === String(this.selectedUnitId));
                            let suffix = u ? (u.abbreviation || u.unit_name) : "All Units";
                            displayName = `All Personnel (${suffix})`;
                        }
                        
                        this.tags.push({
                            userId: userId,
                            unitId: this.selectedUnitId,
                            name: displayName
                        });
                    },
                    
                    removeTag(index) {
                        this.tags.splice(index, 1);
                    }
                }'
                
                @custom-change.window="
                    if($event.detail.name === 'route_unit_id') {
                        updatePersonnelList($event.detail.value, $event.detail.text);
                    }
                    
                    if($event.detail.name === 'route_user_id' && $event.detail.value) {
                        addTag($event.detail.value, $event.detail.text);
                        
                        // Clear the personnel dropdown immediately so they can tag someone else
                        setTimeout(() => {
                            $dispatch('reset-select', { name: 'route_user_id' });
                        }, 50);
                    }
                ">
                
                <h5 class="text-base font-semibold text-gray-400 mb-4">Route To</h5>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        {{-- Now we pass the $routeUnits variable we made at the top --}}
                        <x-native-searchable-select 
                            id="route_unit"
                            name="route_unit_id" 
                            label="Tag Unit"
                            :required="true"
                            :results="$routeUnits" 
                            valueField="id"
                            displayField="unit_name"
                            subDisplayField="abbreviation"
                            placeholder="Select Unit..."
                        />
                    </div>

                    <div>
                        <x-native-searchable-select 
                            id="route_personnel"
                            name="route_user_id" 
                            label="Tag Personnel"
                            :required="true"
                            :results="[]" 
                            valueField="id"
                            displayField="full_name"
                            placeholder="Select Personnel..."
                            emptyMessage="Please select a Unit first."
                        />
                    </div>
                </div>
                
                <div class="lg:col-span-2 mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600">
                        Tags:
                    </label>
                    
                    <div class="bg-white border border-gray-200 rounded-lg p-3 min-h-[90px] max-h-32 overflow-y-auto flex items-start gap-2 flex-wrap cursor-text">
                        
                        <template x-if="tags.length === 0">
                            <span class="text-sm text-gray-400 italic mt-1">No personnel tagged yet.</span>
                        </template>
                        
                        <template x-for="(tag, index) in tags" :key="index">
                            <span class="inline-flex items-center gap-1.5 bg-cyan-100 text-cyan-700 text-xs font-semibold px-3 py-1.5 rounded-md shadow-sm border border-cyan-200">
                                <span x-text="tag.name"></span>
                                <button type="button" @click="removeTag(index)" class="text-cyan-500 hover:text-cyan-800 focus:outline-none transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                                
                                <input type="hidden" name="tagged_users[]" :value="tag.userId">
                                <input type="hidden" name="tagged_units[]" :value="tag.unitId">
                            </span>
                        </template>
                        
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2 mt-2">
                <label class="block mb-2 text-sm font-medium text-gray-600">
                    Remarks:
                </label>
                <textarea rows="4" placeholder="Document Remarks" 
                        class="fbg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-1 focus:border-brand-blue focus:ring-brand-blue focus:outlinle-brand-blue block w-full p-3 resize-none flex-grow min-h-[120px]"></textarea>
            </div>
        </div>
</div>
