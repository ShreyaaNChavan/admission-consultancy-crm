<div class="w-64 min-h-screen bg-blue-900 text-white">

    <div class="p-5 text-2xl font-bold border-b border-blue-700">
        EdTech CRM
    </div>

    <ul class="mt-5">

        <li>
            <a href="/dashboard" class="block px-5 py-3 hover:bg-blue-700">
                Dashboard
            </a>
        </li>

        {{-- Super Admin --}}
        @if(Auth::user()->role->role_name == 'Super Admin')

            <li>
                <a href="{{ route('courses.index') }}" class="block px-5 py-3 hover:bg-blue-700">
                    Courses
                </a>
            </li>

            <li>

                <a href="{{ route('batches.index') }}" class="block px-5 py-3 hover:bg-blue-700">

                    Batches

                </a>

            </li>

            <li>

                <a href="{{ route('fee-structures.index') }}" class="block px-5 py-3 hover:bg-blue-700">

                    Fee Structures

                </a>

            </li>

            <li>
                <a href="{{ route('lead-sources.index') }}" class="block px-5 py-3 hover:bg-blue-700">
                    Lead Sources
                </a>
            </li>

            <li>
                <a href="{{ route('leads.index') }}" class="block px-5 py-3 hover:bg-blue-700">
                    Leads
                </a>
            </li>

            <li>
                <a href="{{ route('admissions.index') }}" class="block px-5 py-3 hover:bg-blue-700">
                    Admissions
                </a>
            </li>



            <li class="px-5 py-3 hover:bg-blue-700">
                Finance
            </li>

            <li class="px-5 py-3 hover:bg-blue-700">
                HR
            </li>

            <li class="px-5 py-3 hover:bg-blue-700">
                Reports
            </li>

            <li class="px-5 py-3 hover:bg-blue-700">
                Settings
            </li>

            <a href="{{ route('designations.index') }}" class="block px-5 py-3 hover:bg-blue-700">

                Designations

            </a>

            <li>
                <a href="{{ route('attendance.index') }}" class="block px-5 py-3 hover:bg-blue-700">

                    Attendance

                </a>
            </li>

        @endif

        {{-- Sales Manager --}}
        @if(Auth::user()->role->role_name == 'Sales Manager')

            <li>
                <a href="{{ route('leads.index') }}" class="block px-5 py-3 hover:bg-blue-700">
                    Leads
                </a>
            </li>

            <li class="px-5 py-3 hover:bg-blue-700">
                Reports
            </li>

        @endif

        {{-- Counselor --}}
        @if(Auth::user()->role->role_name == 'Counselor')

            <li>
                <a href="{{ route('leads.index') }}" class="block px-5 py-3 hover:bg-blue-700">
                    My Leads
                </a>
            </li>

        @endif

        {{-- HR --}}
        @if(Auth::user()->role->role_name == 'HR')

            <li class="px-5 py-3 hover:bg-blue-700">
                Employees
            </li>

            <li class="px-5 py-3 hover:bg-blue-700">
                Attendance
            </li>

            <li class="px-5 py-3 hover:bg-blue-700">
                Payroll
            </li>

        @endif

        {{-- Accountant --}}
        @if(Auth::user()->role->role_name == 'Accountant')

            <li class="px-5 py-3 hover:bg-blue-700">
                Finance
            </li>

            <li class="px-5 py-3 hover:bg-blue-700">
                Reports
            </li>

        @endif

        <li class="px-5 py-3">

            <form action="/logout" method="POST">

                @csrf

                <button>
                    Logout
                </button>

            </form>

        </li>

    </ul>

</div>