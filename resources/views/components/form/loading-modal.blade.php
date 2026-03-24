@props(['open' => 'loading' , 'message' => '', 'id' => ''])

<div x-show="{{ $open }}" id="{{ $id }}" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg p-6 flex flex-col items-center w-72 max-w-sm">
        <!-- Loader SVG -->
        <svg class="w-16 h-16 mb-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
            <circle fill="#00AEEF" stroke="#00AEEF" stroke-width="15" r="15" cx="40" cy="100">
                <animate attributeName="opacity" dur="2s" values="1;0;1;" repeatCount="indefinite" begin="-.4s"/>
            </circle>
            <circle fill="#00AEEF" stroke="#00AEEF" stroke-width="15" r="15" cx="100" cy="100">
                <animate attributeName="opacity" dur="2s" values="1;0;1;" repeatCount="indefinite" begin="-.2s"/>
            </circle>
            <circle fill="#00AEEF" stroke="#00AEEF" stroke-width="15" r="15" cx="160" cy="100">
                <animate attributeName="opacity" dur="2s" values="1;0;1;" repeatCount="indefinite" begin="0s"/>
            </circle>
        </svg>
        <p class="text-md font-semibold text-brand-blue">{{ $message }}</p>
    </div>
</div>