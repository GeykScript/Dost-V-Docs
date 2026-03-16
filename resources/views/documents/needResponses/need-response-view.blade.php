<x-app-layout>
    @section('title', 'View Need Response')
    <div class="p-6">
        <div class="grid grid-col lg:grid-cols-5 gap-3 h-full">
            @include('documents.needResponses.partials.details')
            
            @include('documents.needResponses.partials.timeline')
            
            @include('documents.needResponses.partials.action')
        </div>
    </div>
</x-app-layout>
