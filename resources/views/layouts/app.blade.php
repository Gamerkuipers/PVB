<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="font-sans bg-text antialiased">
<div class="min-h-screen">
    <div class="grid grid-cols-12 min-h-screen">
        <div class="sm:col-span-2 lg:col-span-3 xl:col-span-2 2xl:col-span-1 flex">
            <x-navigation-dashboard/>
        </div>

        <!-- Page Content -->
        <main class="col-span-11 sm:col-span-10 lg:col-span-9 xl:col-span-10 2xl:col-span-11">
            {{ $slot }}
        </main>
    </div>
</div>

@livewireScripts

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts/>
</body>
</html>
