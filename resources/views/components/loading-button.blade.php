
<!-- Use this loading button component if the page loads
when the form is submitted -->


@props([
    'formId' => null, // ID of the form this button will submit
    'type' => 'submit',
])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:outline-none focus:ring-0  transition ease-in-out duration-150']) }}
     data-form-id="{{ $formId }}" >
    {{ $slot }}
</button>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const button = document.querySelector('button[data-form-id="{{ $formId }}"]');
    if (!button) return;

    const form = document.getElementById("{{ $formId }}");
    if (!form) return;

    form.addEventListener('submit', function() {
        button.disabled = true;
        button.innerHTML = `
        <svg fill="hsl(0, 0%, 100%)" viewBox="0 0 24 24" class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"><path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" opacity=".25"/><path d="M12,4a8,8,0,0,1,7.89,6.7A1.53,1.53,0,0,0,21.38,12h0a1.5,1.5,0,0,0,1.48-1.75,11,11,0,0,0-21.72,0A1.5,1.5,0,0,0,2.62,12h0a1.53,1.53,0,0,0,1.49-1.3A8,8,0,0,1,12,4Z"><animateTransform attributeName="transform" type="rotate" dur="0.75s" values="0 12 12;360 12 12" repeatCount="indefinite"/></path></svg>
        <span>Loading...</span>
            `;
    });
});
</script>
