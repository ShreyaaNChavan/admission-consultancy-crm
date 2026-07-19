<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | EdTech CRM ERP</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex">

        {{-- Left Side --}}
        <div class="w-full lg:w-1/2 bg-white flex items-center justify-center px-8">

            <div class="w-full max-w-md">

                {{-- Logo --}}
                <div class="mb-10">

                    <h1 class="text-4xl font-bold text-gray-900">

                        Sign In

                    </h1>

                    <p class="mt-3 text-gray-500">

                        Enter your email and password to sign in.

                    </p>

                </div>

                {{-- Error --}}
                @if(session('error'))

                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-600">

                        {{ session('error') }}

                    </div>

                @endif

                {{-- Login Form --}}
                <form action="/login" method="POST">

                    @csrf

                    {{-- Email --}}
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-semibold text-gray-700">

                            Email

                        </label>

                        <input type="email" name="email" placeholder="Enter your email" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none">

                    </div>

                    {{-- Password --}}
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-semibold text-gray-700">

                            Password

                        </label>

                        <input type="password" name="password" placeholder="Enter your password" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none">

                    </div>

                    

                    {{-- Button --}}
                    <button type="submit"
                        class="w-full rounded-xl bg-blue-600 py-3 font-semibold text-white transition hover:bg-blue-700">

                        Sign In

                    </button>

                </form>

            </div>

        </div>

        {{-- Right Side --}}
        <div class="relative hidden lg:flex lg:w-1/2 items-center justify-center overflow-hidden bg-[#1E1B5E]">

            {{-- Grid Background --}}
            <div class="absolute inset-0 opacity-10">

                <svg width="100%" height="100%">

                    <defs>

                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">

                            <path d="M40 0H0V40" fill="none" stroke="white" stroke-width="1" />

                        </pattern>

                    </defs>

                    <rect width="100%" height="100%" fill="url(#grid)" />

                </svg>

            </div>

            <div class="relative text-center text-white">

                <div class="mx-auto mb-8 flex h-20 w-20 items-center justify-center rounded-2xl ">

                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 3v18M12 7v14M19 11v10" />

                    </svg> -->

                </div>

                <h1 class="text-5xl font-bold">

                    AutoSigma

                </h1>

                <p class="mt-5 text-xl text-blue-100">

                    Education CRM & ERP System

                </p>

                <p class="mt-2 text-sm text-blue-200">

                    Smart • Secure • Scalable

                </p>

            </div>

        </div>

    </div>

</body>

</html>