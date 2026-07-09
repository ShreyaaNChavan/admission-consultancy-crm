<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRM Login</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

        <div class="text-center mb-8">

            <h1 class="text-3xl font-bold text-blue-700">
                EdTech CRM
            </h1>

            <p class="text-gray-500 mt-2">
                Login to continue
            </p>

        </div>

        @if(session('error'))

            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">

                {{ session('error') }}

            </div>

        @endif

        <form action="/login" method="POST">

            @csrf

            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-lg px-4 py-2"
                    required
                >

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-medium">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg px-4 py-2"
                    required
                >

            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">

                Login

            </button>

        </form>

    </div>

</div>

</body>
</html>