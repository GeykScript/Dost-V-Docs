<div x-data class="relative">
    <div 
        :class="$store.sidebar.open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed xl:relative xl:translate-x-0 inset-y-0 left-0 z-50 xl:z-0 w-60 bg-sidebar-bg text-white flex flex-col pt-2 min-h-screen transform transition-transform duration-300 ease-in-out">

        {{-- Logo --}}
        <div class="flex items-center justify-between px-2 sm:px-4 py-2">
            <div class="flex flex-col">
                <h1 class="text-3xl font-black italic tracking-tight">
                    <span class="text-brand-blue">D</span>OCS
                </h1>
                <h3 class="text-[9px] font-medium leading-none tracking-tight">
                    <span class="text-brand-blue">Document</span> Operation Communication System
                </h3>
            </div>

            {{-- Close button for mobile --}}
            <button @click="$store.sidebar.close()" class="text-gray-400 hover:text-gray-500 xl:hidden">
                <x-heroicon-s-x-mark class="h-5 w-5"/>
            </button>
        </div>

        {{-- Menu --}}
        <ul class="flex-1 overflow-y-auto mt-6 space-y-1">
            <x-sidebar-item label="Dashboard" icon="s-squares-2x2" route="dashboard"/>

            <p class="text-xs mt-4 mb-2 ml-4 font-semibold text-gray-500 uppercase tracking-wider">
                Document Management
            </p>
            <x-sidebar-item label="Need Responses" icon="s-tag" route="need-response"/>
            <x-sidebar-item label="Create Document" icon="s-plus" route="create-document"/>
            <x-sidebar-item label="My Documents" icon="s-document-text" route="my-documents"/>
            <x-sidebar-item label="All Documents" icon="o-clipboard-document-list" route="all-documents"/>

           @if(auth()->user()->is_super_admin == 1)
                <p class="text-xs mt-4 mb-2 ml-4 font-semibold text-gray-500 uppercase tracking-wider">
                    Users & Groups
                </p>
                <x-sidebar-item label="Accounts" icon="s-user-group" route="accounts"/>
                <x-sidebar-item label="Units" icon="s-building-office" route="units"/>

                <p class="text-xs mt-4 mb-2 ml-4 font-semibold text-gray-500 uppercase tracking-wider">
                    Document Setup
                </p>
                <x-sidebar-item label="Action" icon="o-document-plus" route="action"/>
                <x-sidebar-item label="Type" icon="o-document-duplicate" route="type"/>
            @endif

        </ul>
    </div>
</div>