<x-app-layout>
    @section('title', 'Transaction Details')
    <div class="p-6">
        <div class="grid grid-col lg:grid-cols-5 gap-3 h-full">
            @include('documents.transaction.partials.details')
            
            @include('documents.transaction.partials.timeline')
            
            @include('documents.transaction.partials.action')
        </div>
    </div>
</x-app-layout>
