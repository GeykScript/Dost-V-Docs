@props([
	'successMessage' => null,
	'errorMessage' => null,
])

@if ($successMessage)
	<div
		wire:key="{{ $successMessage . uniqid() }}"
		x-data="{ show: true }"
		x-init="setTimeout(() => show = false, 4000)"
		x-show="show"
		x-transition
		x-cloak
		class="fixed z-50 top-12 right-4 left-4 sm:left-auto sm:right-6  sm:top-20 w-auto sm:w-96 rounded-lg border border-green-400 bg-green-50 px-4 py-3 text-sm font-medium text-green-500 shadow-lg flex items-center gap-2">
			<x-heroicon-s-check-circle class="w-8 h-8  mr-1" />
            {{ $successMessage }}
	</div>
@elseif ($errorMessage)
	<div
		wire:key="{{ $errorMessage . uniqid() }}"
		x-data="{ show: true }"
		x-init="setTimeout(() => show = false, 4000)"
		x-show="show"
		x-transition
		x-cloak
		class="fixed z-50 top-12 right-4 left-4 sm:left-auto sm:right-6  sm:top-20 w-auto sm:w-96 rounded-lg border border-red-400 bg-red-50 px-4 py-3 text-sm font-medium text-red-500 shadow-lg flex items-center gap-2">

		    <x-heroicon-s-x-circle class="w-8 h-8  mr-1" /> 
            {{ $errorMessage }}
	</div>
@endif

