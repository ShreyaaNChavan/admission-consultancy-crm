@php
    $role = Auth::user()->role->role_name;
@endphp

<aside class="fixed left-0 top-0 z-40 h-screen w-72 overflow-y-auto border-r border-gray-200 bg-white shadow-sm">

    {{-- Logo --}}
    <div class="flex h-20 items-center border-b border-gray-200 px-8">

        <div>

            <h1 class="text-2xl font-bold tracking-wide text-gray-800">
                EdTech CRM
            </h1>

            <p class="text-sm text-gray-500">
                Education ERP
            </p>

        </div>

    </div>

    {{-- Navigation --}}
    <nav class="px-5 py-6">

        {{-- Dashboard --}}
        <div class="mb-8">

            <a href="/dashboard"
                class="flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                {{ request()->is('dashboard') ? 'bg-blue-600 text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">

                Dashboard

            </a>

        </div>

        {{-- CRM --}}
        @if(in_array($role, ['Super Admin', 'Sales Manager', 'Counselor', 'Receptionist']))

            <div class="mb-8">

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-400">

                    CRM

                </p>

                <div class="space-y-1">

                    <a href="{{ route('leads.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                                                                    {{ request()->routeIs('leads.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Leads

                    </a>


                    @if(in_array($role, ['Super Admin', 'Sales Manager', 'Counselor']))
                        <a href="{{ route('lead-sources.index') }}"
                            class="flex items-center rounded-lg px-4 py-3 text-sm font-medium transition
                                                                                {{ request()->routeIs('lead-sources.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">

                            Lead Sources

                        </a>
                    @endif

                </div>

            </div>

        @endif

        {{-- Academics --}}
        @if(in_array($role, ['Super Admin', 'Faculty']))

            <div class="mb-8">

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Academics

                </p>

                <div class="space-y-1">

                    <a href="{{ route('courses.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                                                                {{ request()->routeIs('courses.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Courses

                    </a>

                    <a href="{{ route('batches.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                                                                {{ request()->routeIs('batches.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Batches

                    </a>

                    <a href="{{ route('attendance.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                                                                {{ request()->routeIs('attendance.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Attendance

                    </a>

                </div>

            </div>

        @endif

        {{-- Admissions --}}
        @if(
                in_array(
                    $role,
                    [
                        'Super Admin',
                        'Sales Manager',
                        'Counselor',
                        'Accountant',
                        'Receptionist'
                    ]
                )
            )

            <div class="mb-8">

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Admissions

                </p>

                <div class="space-y-1">

                    <a href="{{ route('admissions.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                                                                {{ request()->routeIs('admissions.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Admissions

                    </a>


                    @if(
                            in_array(
                                $role,
                                [
                                    'Super Admin',
                                    'Sales Manager',
                                    'Counselor',
                                    'Accountant',
                                    'Receptionist',
                                    'Faculty'
                                ]
                            )
                        )

                        <a href="{{ route('students.index') }}"
                            class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                                {{ request()->routeIs('students.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                            Students

                        </a>

                    @endif

                </div>

            </div>

        @endif

        @if($role == 'Super Admin')

            <div class="mb-8">

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Administration

                </p>

                <div class="space-y-1">

                    <a href="{{ route('users.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                            {{ request()->routeIs('users.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        User Management

                    </a>

                </div>

            </div>

        @endif

        {{-- Finance --}}
        @if(in_array($role, ['Super Admin', 'Accountant']))

            <div class="mb-8">

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Finance

                </p>

                <div class="space-y-1">

                    <a href="{{ route('fee-structures.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                                                                            {{ request()->routeIs('fee-structures.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Fee Structures

                    </a>

                    <a href="{{ route('payments.all') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                        {{ request()->routeIs('payments.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                        Payments
                    </a>

                    <a href="{{ route('payrolls.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                            {{ request()->routeIs('payrolls.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Payroll

                    </a>

                </div>

            </div>

        @endif




        <!--         
        {{-- CRM --}}
        @if(in_array($role, ['Super Admin', 'Sales Manager', 'Counselor', 'Receptionist']))

            <div class="mb-8">

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-400">

                    CRM

                </p>

                <div class="space-y-1">

                    <a href="{{ route('leads.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                                                                                                {{ request()->routeIs('leads.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Leads

                    </a>


                    @if(in_array($role, ['Super Admin', 'Sales Manager', 'Counselor']))
                        <a href="{{ route('lead-sources.index') }}"
                            class="flex items-center rounded-lg px-4 py-3 text-sm font-medium transition
                                                                        {{ request()->routeIs('lead-sources.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">

                            Lead Sources

                        </a>
                    @endif

                </div>

            </div>

        @endif -->

        {{-- Students --}}
        @if(
                in_array(
                    $role,
                    [
                        'Super Admin',
                        'Sales Manager',
                        'Counselor',
                        'Accountant',
                        'Receptionist',
                        'Faculty'
                    ]
                )
            )

            <div class="mb-8">

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Students

                </p>

                <div class="space-y-1">

                    <a href="{{ route('students.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                            {{ request()->routeIs('students.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Students

                    </a>

                </div>

            </div>

        @endif

        {{-- HR --}}
        @if(in_array($role, ['Super Admin', 'HR']))

            <div class="mb-8">

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Human Resources

                </p>

                <div class="space-y-1">

                    <a href="{{ route('employees.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                            {{ request()->routeIs('employees.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Employees

                    </a>

                    <a href="{{ route('employee-attendances.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                            {{ request()->routeIs('employee-attendances.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Employee Attendance

                    </a>

                    <a href="{{ route('leave-requests.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                            {{ request()->routeIs('leave-requests.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Leave Management

                    </a>

                    <a href="{{ route('faculties.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm font-medium transition
                            {{ request()->routeIs('faculties.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">

                        Faculty

                    </a>

                    <a href="{{ route('designations.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                            {{ request()->routeIs('designations.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        Designations

                    </a>

                </div>

            </div>

        @endif

        {{-- Employee Portal --}}
        @if(Auth::user()->employee)

            <div class="mb-8">

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Employee Portal

                </p>

                <div class="space-y-1">

                    <a href="{{ route('employee.leave.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                            {{ request()->routeIs('employee.leave.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        My Leave

                    </a>

                    <a href="#" class="flex items-center rounded-lg px-4 py-3 text-sm text-gray-400 cursor-not-allowed">

                        My Attendance

                    </a>

                    <a href="{{ route('employee.payroll.index') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                            {{ request()->routeIs('employee.payroll.*') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        My Payroll

                    </a>

                    <a href="{{ route('employee.profile') }}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm transition
                            {{ request()->routeIs('employee.profile') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                        My Profile

                    </a>

                </div>

            </div>

        @endif

        <div class="mt-10 border-t border-gray-200 pt-6">

            <div class="rounded-2xl bg-gray-50 p-4">

                <p class="text-sm font-semibold text-gray-800">

                    {{ Auth::user()->name }}

                </p>

                <p class="mt-1 text-xs text-gray-500">

                    {{ Auth::user()->role->role_name }}

                </p>

                <form action="/logout" method="POST" class="mt-4">

                    @csrf

                    <button type="submit"
                        class="w-full rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-medium text-red-600 transition hover:bg-red-100">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </nav>

</aside>