<x-app-layout>
@section('title', 'Add Account')

<!-- Account Add Page  -->
<div class="min-h-screen w-full p-4 sm:p-6">

        <div class="w-full gap-3">
            <div class=" bg-white shadow-sm rounded-lg flex flex-col">
            <section class="p-4 md:p-10">
                @include('account.partials.add-account-form')
            </section>
            </div>
        </div>
    </div>
        <footer class="text-xs text-gray-600  text-center p-4">
        © 2026 All rights reserved | Developed by Department of Science and Technology - Regional Office V - Management Information Services Unit
    </footer>
</div>


</x-app-layout>