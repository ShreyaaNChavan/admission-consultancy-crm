<div class="sticky top-0 z-30 flex h-20 items-center justify-between border-b border-gray-200 bg-white px-8">

    {{-- Left Section --}}
    <div>

        <h1 class="text-2xl font-semibold text-gray-900">
            {{ $pageTitle }}
        </h1>

        <p class="mt-1 text-sm text-gray-500">

            Welcome back,

            <span class="font-medium text-gray-700">

                {{ Auth::user()->name }}

            </span>

        </p>

    </div>

    {{-- Right Section --}}
    <div class="flex items-center gap-6">

        {{-- Search --}}
        <div class="hidden lg:block">

            <input type="text" placeholder="Search..."
                class="w-72 rounded-xl border border-gray-300 bg-white px-4 py-2 text-sm outline-none transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

        </div>

        {{-- User Info --}}
        <div class="text-right">

            <p class="text-sm font-semibold text-gray-800">

                {{ Auth::user()->name }}

            </p>

            <p class="text-xs text-gray-500">

                {{ Auth::user()->role->role_name }}

            </p>

        </div>

        {{-- Avatar --}}
        <div
            class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-600 text-sm font-semibold text-white shadow">

            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

        </div>

    </div>

</div>