<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>
    <body class="font-sans antialiased text-gray-900">
        
        {{-- 1. FONDO FIJO PARA TODA LA APP --}}
        {{-- Esto pone la imagen detrás de todo y le aplica el efecto borroso --}}
        <div class="fixed inset-0 -z-50 bg-center bg-cover bg-no-repeat" 
             style="background-image: url('{{ asset('images/fondo.jpg') }}');">
            {{-- Capa de superposición para que se lea el texto (blanco en día, negro en noche) --}}
            <div class="absolute inset-0 bg-white/60 dark:bg-gray-900/85 backdrop-blur-sm transition-colors duration-500"></div>
        </div>

        {{-- 2. CONTENEDOR PRINCIPAL --}}
        {{-- Quitamos bg-gray-100 para que sea transparente --}}
        <div class="min-h-screen relative">
            
            @include('layouts.navigation')

            @isset($header)
                {{-- Header con efecto Glass (transparente) en lugar de blanco sólido --}}
                <header class="bg-white/40 dark:bg-gray-800/40 backdrop-blur-md border-b border-white/20 dark:border-gray-700/30 shadow-sm transition-colors duration-300">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>