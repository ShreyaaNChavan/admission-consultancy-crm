<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-xl font-semibold text-gray-900">
                Quick Actions
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Frequently used operations
            </p>

        </div>

    </div>

    <div class="mt-6 grid grid-cols-2 gap-4 md:grid-cols-3 xl:grid-cols-6">

        {{-- Add Lead --}}
        <a href="{{ route('leads.create') }}"
            class="group rounded-xl border border-gray-200 bg-gray-50 p-5 transition hover:border-blue-500 hover:bg-blue-50 hover:shadow">

            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-7 w-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 7.5V6A2.25 2.25 0 0015.75 3.75h-7.5A2.25 2.25 0 006 6v12a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 18V16.5M15 12h6m-3-3v6" />
                </svg>

            </div>

            <h3 class="mt-4 font-semibold text-gray-800">Add Lead</h3>

            <p class="mt-1 text-sm text-gray-500">
                New enquiry
            </p>

        </a>

        {{-- Admission --}}
        <a href="{{ route('admissions.index') }}"
            class="group rounded-xl border border-gray-200 bg-gray-50 p-5 transition hover:border-green-500 hover:bg-green-50 hover:shadow">

            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100 text-green-600">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-7 w-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7.5L12 3l9 4.5M3 7.5V16.5L12 21l9-4.5V7.5M12 3v18" />
                </svg>

            </div>

            <h3 class="mt-4 font-semibold text-gray-800">Admission</h3>

            <p class="mt-1 text-sm text-gray-500">
                Convert student
            </p>

        </a>

        {{-- Students --}}
        <a href="{{ route('students.index') }}"
            class="group rounded-xl border border-gray-200 bg-gray-50 p-5 transition hover:border-indigo-500 hover:bg-indigo-50 hover:shadow">

            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-7 w-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 002.625.372A9.337 9.337 0 0021 18.843V6.75M3 6.75v12.093A9.337 9.337 0 006.375 19.5A9.38 9.38 0 009 19.128m6-9.878a3 3 0 11-6 0 3 3 0 016 0zM6.75 21h10.5" />
                </svg>

            </div>

            <h3 class="mt-4 font-semibold text-gray-800">Students</h3>

            <p class="mt-1 text-sm text-gray-500">
                Student records
            </p>

        </a>

        {{-- Employee --}}
        <a href="{{ route('employees.create') }}"
            class="group rounded-xl border border-gray-200 bg-gray-50 p-5 transition hover:border-purple-500 hover:bg-purple-50 hover:shadow">

            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-purple-100 text-purple-600">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-7 w-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72A9.094 9.094 0 0012 16.5a9.094 9.094 0 00-6 2.22M15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                </svg>

            </div>

            <h3 class="mt-4 font-semibold text-gray-800">Employees</h3>

            <p class="mt-1 text-sm text-gray-500">
                Manage staff
            </p>

        </a>

        {{-- Course --}}
        <a href="{{ route('courses.create') }}"
            class="group rounded-xl border border-gray-200 bg-gray-50 p-5 transition hover:border-orange-500 hover:bg-orange-50 hover:shadow">

            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-orange-100 text-orange-600">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-7 w-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.75v10.5m0-10.5L4.5 10.5l7.5 3.75 7.5-3.75L12 6.75z" />
                </svg>

            </div>

            <h3 class="mt-4 font-semibold text-gray-800">Courses</h3>

            <p class="mt-1 text-sm text-gray-500">
                Course master
            </p>

        </a>

        {{-- Batch --}}
        <a href="{{ route('batches.create') }}"
            class="group rounded-xl border border-gray-200 bg-gray-50 p-5 transition hover:border-cyan-500 hover:bg-cyan-50 hover:shadow">

            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-cyan-100 text-cyan-600">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-7 w-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7.5L12 3l9 4.5-9 4.5L3 7.5zm0 6L12 18l9-4.5" />
                </svg>

            </div>

            <h3 class="mt-4 font-semibold text-gray-800">Batches</h3>

            <p class="mt-1 text-sm text-gray-500">
                Create batch
            </p>

        </a>

    </div>

</div>

