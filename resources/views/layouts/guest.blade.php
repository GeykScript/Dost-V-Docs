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
    </head>
    <body class="font-sans text-gray-800 antialiased">
        <div class="flex flex-col  p-4 bg-white gap-3">
            <!-- Dost Header  -->
            <div class="flex gap-2 p-3 md:px-20">   
                <img src="{{ asset('logo/dost_logo.svg') }}" alt="DOST Logo" class="w-auto h-9 md:h-12">
                <div class="flex flex-col text-gray-800">
                    <ul class="m-0 p-0">
                        <li class="leading-none m-0 font-bold text-[12px] md:text-[20px]">DOST</li>
                        <li class="leading-none m-0 text-[10px] md:text-[14px]">BICOL</li>
                        <li class="leading-none m-0 font-semibold text-[8px] md:text-[12px] truncate">OneDOST4U: Solutions and Opportunities</li>
                    </ul>
                </div>
            </div>
            <!-- Login -->
            <div class="flex items-center justify-center w-full">
                <div class="w-full sm:max-w-xl bg-white shadow-lg sm:rounded-lg">
                    <img src="{{ asset ('logo/dost_banner.png') }}" alt="DOST Banner" class="shadow-md">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <!-- footer part -->
        <footer class="my-3 ">
            <div class="text-[8px] md:text-[10px] flex flex-col items-center justify-center">
                <p>© 2026 All rights reserved </p>
                <p>Developed by Department of Science and Technology - Regional Office V</p>
                <p>Management Information Services Unit</p>
            </div>
        </footer>
    </body>
</html>
