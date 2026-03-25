<div x-data="{ 
        show: false, 
        message: '', 
        type: 'success',
        initToast(msg, t) {
            this.message = msg;
            this.type = t;
            this.show = true;
            setTimeout(() => this.show = false, 4000);
        }
    }"
    @notify.window="initToast($event.detail.message, $event.detail.type)"
    x-init="
        @if(session('success')) initToast('{{ session('success') }}', 'success'); @endif
        @if(session('error')) initToast('{{ session('error') }}', 'error'); @endif
    "
    x-cloak
    x-show="show"
    x-transition
    class="fixed z-50 top-12 right-4 left-4 sm:left-auto sm:right-6 sm:top-20 w-auto sm:w-96 rounded-lg border px-4 py-3 text-sm font-medium shadow-lg flex items-center gap-2"
    x-bind:class="type === 'success' ? 'border-green-400 bg-green-50 text-green-500' : 'border-red-400 bg-red-50 text-red-500'"
>
    <template x-if="type === 'success'">
        <x-heroicon-s-check-circle class="w-8 h-8 mr-1" />
    </template>
    <template x-if="type === 'error'">
        <x-heroicon-s-x-circle class="w-8 h-8 mr-1" />
    </template>
    <span x-text="message"></span>
</div>