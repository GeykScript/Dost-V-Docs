<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('docs_icon.png') }}">
        <title>{{ config('app.name', 'DOCS') }}</title>

   
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Livewire Styles -->
        @livewireStyles
    </head>    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 h-screen flex">
            
            @include('components.sidebar')

            <div class="flex flex-col flex-1 overflow-hidden">
                
                @include('layouts.navigation')

                <main class="flex-1 overflow-y-auto bg-gray-100">
                    {{ $slot }}
                </main>
            </div>
            
        </div>
        @livewireScripts
    </body>
</html>
