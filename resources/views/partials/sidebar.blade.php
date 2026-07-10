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

        <li>
            <a href="{{ route('courses.index') }}" class="block px-5 py-3 hover:bg-blue-700">

                Courses

            </a>
        </li>

        <li>
            <a href="{{ route('lead-sources.index') }}" class="block px-5 py-3 hover:bg-blue-700">

                Lead Sources

            </a>
        </li>

        @if(Auth::user()->role->role_name == 'Super Admin')

            <li>
                <a href="/leads" class="block px-5 py-3 hover:bg-blue-700">
                    Leads
                </a>
            </li>

            <li class="px-5 py-3 hover:bg-blue-700">

                Admissions

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

        @endif

        @if(Auth::user()->role->role_name == 'Counselor')

            <li class="px-5 py-3 hover:bg-blue-700">

                Leads

            </li>

            <li class="px-5 py-3 hover:bg-blue-700">

                Admissions

            </li>

        @endif

        @if(Auth::user()->role->role_name == 'HR')

            <li class="px-5 py-3 hover:bg-blue-700">

                HR

            </li>

        @endif

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