<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PharmaPlus') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main content -->
    <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300">
        <!-- Navigation / top bar -->
        @include('layouts.navigation')

        <!-- Page content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.footer')
    </div>

    <script>
        // Dark mode toggle
        const toggleDark = document.querySelector('#darkToggle');
        if(toggleDark){
            toggleDark.addEventListener('click', ()=>{
                document.documentElement.classList.toggle('dark');
                localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
            });
            if(localStorage.theme === 'dark'){
                document.documentElement.classList.add('dark');
            }
        }
    </script>
</body>
</html>
