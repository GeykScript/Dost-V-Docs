<x-app-layout>
    @section('title', 'Need Response')
    <div class="p-6">
        <div class="grid grid-col lg:grid-cols-5 gap-3 h-full">
            @include('documents.needResponses.partials.details')
            <div class="col-span-2 grid-col h-full gap-3">
                @include('documents.needResponses.partials.action')
                @include('documents.needResponses.partials.timeline')
            </div>
        </div>
    </div>
</x-app-layout>
