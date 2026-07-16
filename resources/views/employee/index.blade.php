@extends('layouts.app')

@section('page-title', 'Employees')

@section('content')

    <div class="space-y-6">

        {{-- Filters --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET" action="{{ route('employees.index') }}">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">

                    <div>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search employee..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">All Status</option>

                            <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>

                                Inactive

                            </option>

                        </select>

                    </div>

                    <div></div>

                    <div>

                        <button class="w-full rounded-xl bg-slate-900 py-3 text-sm font-semibold text-white">

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

        {{-- Header --}}
        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-3xl font-bold text-gray-900">

                    Employees

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Manage all organization employees.

                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="rounded-xl bg-blue-50 px-5 py-3">

                    <p class="text-xs font-semibold uppercase tracking-wide text-blue-600">

                        Total Employees

                    </p>

                    <p class="mt-1 text-2xl font-bold text-blue-700">

                        {{ $employees->total() }}

                    </p>

                </div>

                <a href="{{ route('employees.create') }}"
                    class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">

                    + Add Employee

                </a>

            </div>

        </div>

        {{-- Success --}}
        @if(session('success'))

            <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">

                {{ session('success') }}

            </div>

        @endif

        {{-- Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-gray-50 border-b">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">Code</th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">Employee</th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">Department</th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">Designation</th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">Phone</th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">Status</th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase text-gray-500">Action</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($employees as $employee)

                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4 font-semibold text-blue-600">

                                    {{ $employee->employee_code }}

                                </td>

                                <td class="px-6 py-4">

                                    <div class="font-semibold">

                                        {{ $employee->full_name }}

                                    </div>

                                    <div class="text-sm text-gray-500">

                                        {{ $employee->email }}

                                    </div>

                                </td>

                                <td class="px-6 py-4">

                                    {{ $employee->department?->department_name }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $employee->designation?->designation_name }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $employee->phone }}

                                </td>

                                <td class="px-6 py-4">

                                    @if($employee->status == 'Active')

                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                            Active

                                        </span>

                                    @else

                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                            Inactive

                                        </span>

                                    @endif

                                </td>

                                <td class="px-6 py-4 text-center">

                                    <a href="{{ route('employees.edit', $employee) }}"
                                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700">

                                        Edit

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="px-6 py-12 text-center text-gray-500">

                                    No Employees Found

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{ $employees->links() }}

    </div>

@endsection