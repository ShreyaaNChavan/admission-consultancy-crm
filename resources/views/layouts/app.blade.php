<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EdTech CRM</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="flex">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex-1">

        {{-- Navbar --}}
        @include('partials.navbar')

        <main class="p-6">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>