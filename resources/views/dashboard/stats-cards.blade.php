<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">

    {{-- Total Leads --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-medium text-gray-500">

                    Total Leads

                </p>

                <h2 class="mt-2 text-4xl font-bold text-gray-900">

                    {{ $totalLeads }}

                </h2>

                <p class="mt-3 text-sm text-green-600">

                    Registered enquiries

                </p>

            </div>

            <div class="h-16 w-16 rounded-xl bg-blue-100 flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5V4H2v16h5m10 0v-4a3 3 0 00-3-3H10a3 3 0 00-3 3v4m10 0H7m10-12a4 4 0 11-8 0 4 4 0 018 0z" />

                </svg>

            </div>

        </div>

    </div>


    {{-- Admissions --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-medium text-gray-500">

                    Admissions

                </p>

                <h2 class="mt-2 text-4xl font-bold text-gray-900">

                    {{ $totalStudents }}

                </h2>

                <p class="mt-3 text-sm text-green-600">

                    Converted students

                </p>

            </div>

            <div class="h-16 w-16 rounded-xl bg-green-100 flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14z" />

                </svg>

            </div>

        </div>

    </div>


    {{-- Students --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-medium text-gray-500">

                    Active Students

                </p>

                <h2 class="mt-2 text-4xl font-bold text-gray-900">

                    {{ $totalStudents }}

                </h2>

                <p class="mt-3 text-sm text-green-600">

                    Currently enrolled

                </p>

            </div>

            <div class="h-16 w-16 rounded-xl bg-indigo-100 flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A9 9 0 1118.879 6.196 9 9 0 015.12 17.804z" />

                </svg>

            </div>

        </div>

    </div>


    {{-- Employees --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-medium text-gray-500">

                    Employees

                </p>

                <h2 class="mt-2 text-4xl font-bold text-gray-900">

                    {{ $totalEmployees }}

                </h2>

                <p class="mt-3 text-sm text-green-600">

                    Active staff

                </p>

            </div>

            <div class="h-16 w-16 rounded-xl bg-purple-100 flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5V4H2v16h5" />

                </svg>

            </div>

        </div>

    </div>


    {{-- Revenue --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-medium text-gray-500">

                    Revenue

                </p>

                <h2 class="mt-2 text-4xl font-bold text-green-600">

                    ₹{{ number_format($totalRevenue) }}

                </h2>

                <p class="mt-3 text-sm text-green-600">

                    Total fee collected

                </p>

            </div>

            <div class="h-16 w-16 rounded-xl bg-green-100 flex items-center justify-center">

                ₹

            </div>

        </div>

    </div>


    {{-- Pending Fees --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-medium text-gray-500">

                    Pending Fees

                </p>

                <h2 class="mt-2 text-4xl font-bold text-red-600">

                    ₹{{ number_format($pendingFees) }}

                </h2>

                <p class="mt-3 text-sm text-red-500">

                    Yet to collect

                </p>

            </div>

            <div class="h-16 w-16 rounded-xl bg-red-100 flex items-center justify-center">

                ₹

            </div>

        </div>

    </div>

</div>