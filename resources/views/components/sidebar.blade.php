<div x-data="sideMenu()" class="relative">
    <div :class="$store.sidebar.open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed xl:relative xl:translate-x-0 inset-y-0 left-0 z-50 xl:z-0 w-60 bg-sidebar-bg text-white flex flex-col pt-2 min-h-screen transform transition-transform duration-300 ease-in-out lg:flex">        

        <div class="flex items-center justify-between px-4 py-4">
            <div class="flex flex-col">
                <h1 class="text-3xl text-white font-black italic leading-tight tracking-tight">
                    <span class="text-brand-blue">D</span>OCS
                </h1>
                <h3 class="font-medium text-white text-[9px] leading-none tracking-tight">
                    <span class="text-brand-blue">Document</span> Operation Communication System
                </h3>
            </div>
            <button @click="$store.sidebar.close()" class="text-gray-400 hover:text-gray-500 xl:hidden">
                <x-heroicon-s-x-mark class="h-5 w-5" />
            </button>
        </div>

        <ul class="flex-1 overflow-y-auto mt-6 space-y-1">
            @include('components.sidebar-item', ['id' => 'dashboard', 'label' => 'Dashboard', 'icon' => 's-squares-2x2'])
            
            <p class="text-xs mt-4 mb-2 ml-4 font-semibold text-gray-500 uppercase tracking-wider">Document Management</p>
            @include('components.sidebar-item', ['id' => 'need-responses', 'label' => 'Need Response', 'icon' => 's-tag'])
            @include('components.sidebar-item', ['id' => 'create-document', 'label' => 'Create Document', 'icon' => 's-plus'])
            @include('components.sidebar-item', ['id' => 'my-documents', 'label' => 'My Documents', 'icon' => 's-document-text'])
            @include('components.sidebar-item', ['id' => 'all-documents', 'label' => 'All Documents', 'icon' => 'o-clipboard-document-list'])

            <p class="text-xs mt-4 mb-2 ml-4 font-semibold text-gray-500 uppercase tracking-wider">Users & Groups</p>
            @include('components.sidebar-item', ['id' => 'account', 'label' => 'Accounts', 'icon' => 's-user-group'])
            @include('components.sidebar-item', ['id' => 'units', 'label' => 'Units', 'icon' => 's-building-office'])

            <p class="text-xs mt-4 mb-2 ml-4 font-semibold text-gray-500 uppercase tracking-wider">Document Setup</p>
            @include('components.sidebar-item', ['id' => 'action', 'label' => 'Action', 'icon' => 'o-document-plus'])
            @include('components.sidebar-item', ['id' => 'type', 'label' => 'Type', 'icon' => 'o-document-duplicate'])
        </ul>
    </div>
</div>