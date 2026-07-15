<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EdTech CRM ERP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 overflow-x-hidden">
    <div class="min-h-screen">

        {{-- Sidebar --}}
        @include('partials.sidebar')

        {{-- Main Area --}}
        <div class="ml-72 min-h-screen">

            {{-- Navbar --}}
            @include('partials.navbar', [
                'pageTitle' => trim($__env->yieldContent('page-title')) ?: 'Dashboard'
            ])

            <main class="p-6">

                <div class="mx-auto w-full max-w-7xl">

                    @yield('content')

                </div>

            </main>

        </div>

    </div>

    @stack('scripts')

</body>

</html>