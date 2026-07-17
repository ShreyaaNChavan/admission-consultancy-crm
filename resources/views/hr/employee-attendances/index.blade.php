@extends('layouts.app')
@section('page-title', 'Employee Attendance')
@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">

                Employee Attendance

            </h2>

            <p class="mt-1 text-sm text-gray-500">

                Track employee attendance, check-ins, leave records and daily presence.

            </p>

        </div>

        <a href="{{ route('employee-attendances.create') }}"
            class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4v16m8-8H4"/>

            </svg>

            Mark Attendance

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div
            class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">

            {{ session('success') }}

        </div>

    @endif


    {{-- Statistics --}}
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-2xl border border-green-100 bg-white p-6 shadow-sm">

            <p class="text-sm font-medium text-gray-500">

                Present Today

            </p>

            <div class="mt-3 flex items-center justify-between">

                <h3 class="text-3xl font-bold text-green-600">

                    {{ $presentCount }}

                </h3>

                <div
                    class="rounded-xl bg-green-100 p-3">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-green-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"/>

                    </svg>

                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-red-100 bg-white p-6 shadow-sm">

            <p class="text-sm font-medium text-gray-500">

                Absent

            </p>

            <div class="mt-3 flex items-center justify-between">

                <h3 class="text-3xl font-bold text-red-600">

                    {{ $absentCount }}

                </h3>

                <div class="rounded-xl bg-red-100 p-3">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-red-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-yellow-100 bg-white p-6 shadow-sm">

            <p class="text-sm font-medium text-gray-500">

                Late

            </p>

            <div class="mt-3 flex items-center justify-between">

                <h3 class="text-3xl font-bold text-yellow-600">

                    {{ $lateCount }}

                </h3>

                <div class="rounded-xl bg-yellow-100 p-3">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-yellow-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4l3 3"/>

                        <circle
                            cx="12"
                            cy="12"
                            r="9"/>

                    </svg>

                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">

            <p class="text-sm font-medium text-gray-500">

                Leave

            </p>

            <div class="mt-3 flex items-center justify-between">

                <h3 class="text-3xl font-bold text-slate-700">

                    {{ $leaveCount }}

                </h3>

                <div class="rounded-xl bg-slate-100 p-3">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-slate-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                    </svg>

                </div>

            </div>

        </div>

    </div>


    {{-- Filters --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <form method="GET">

            <div class="grid gap-4 md:grid-cols-4">

                <div>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search Employee..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                <div>

                    <select
                        name="status"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <option value="">All Status</option>

                        <option value="Present" @selected(request('status')=='Present')>

                            Present

                        </option>

                        <option value="Absent" @selected(request('status')=='Absent')>

                            Absent

                        </option>

                        <option value="Late" @selected(request('status')=='Late')>

                            Late

                        </option>

                        <option value="Half Day" @selected(request('status')=='Half Day')>

                            Half Day

                        </option>

                        <option value="Leave" @selected(request('status')=='Leave')>

                            Leave

                        </option>

                    </select>

                </div>

                <div>

                    <input
                        type="date"
                        name="attendance_date"
                        value="{{ request('attendance_date') }}"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                <button
                    class="rounded-xl bg-slate-900 py-3 font-semibold text-white transition hover:bg-slate-800">

                    Search

                </button>

            </div>

        </form>

    </div>


    {{-- Attendance Table --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full">
<thead class="border-b border-gray-200 bg-gray-50">

    <tr>

        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

            #

        </th>

        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

            Employee

        </th>

        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

            Attendance Date

        </th>

        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

            Check In

        </th>

        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

            Check Out

        </th>

        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

            Status

        </th>

        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

            Remarks

        </th>

        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">

            Actions

        </th>

    </tr>

</thead>

<tbody class="divide-y divide-gray-100 bg-white">

@forelse($attendances as $attendance)

<tr class="transition hover:bg-gray-50">

    <td class="px-6 py-4 font-medium text-gray-700">

        {{ $loop->iteration + ($attendances->firstItem() - 1) }}

    </td>

    <td class="px-6 py-4">

        <div class="font-semibold text-gray-900">

            {{ $attendance->employee->full_name }}

        </div>

    </td>

    <td class="px-6 py-4 text-gray-600">

        {{ $attendance->attendance_date->format('d M Y') }}

    </td>

    <td class="px-6 py-4 text-gray-600">

        {{ $attendance->check_in ?? '-' }}

    </td>

    <td class="px-6 py-4 text-gray-600">

        {{ $attendance->check_out ?? '-' }}

    </td>

    <td class="px-6 py-4">

        @switch($attendance->status)

            @case('Present')

                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                    Present

                </span>

            @break

            @case('Absent')

                <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                    Absent

                </span>

            @break

            @case('Late')

                <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                    Late

                </span>

            @break

            @case('Half Day')

                <span class="inline-flex rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-700">

                    Half Day

                </span>

            @break

            @default

                <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">

                    Leave

                </span>

        @endswitch

    </td>

    <td class="px-6 py-4 text-gray-600">

        {{ $attendance->remarks ?: '-' }}

    </td>

    <td class="px-6 py-4">

        <div class="flex justify-center gap-2">

            <a href="{{ route('employee-attendances.edit',$attendance) }}"
                class="rounded-lg bg-amber-100 p-2 text-amber-600 transition hover:bg-amber-200">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L12 15l-4 1 1-4 8.586-8.586z"/>

                </svg>

            </a>

            <form
                action="{{ route('employee-attendances.destroy',$attendance) }}"
                method="POST"
                onsubmit="return confirm('Delete this attendance record?')">

                @csrf

                @method('DELETE')

                <button
                    class="rounded-lg bg-red-100 p-2 text-red-600 transition hover:bg-red-200">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7L5 7m5 4v6m4-6v6M10 3h4a1 1 0 011 1v2H9V4a1 1 0 011-1zm-3 4h10l-1 13H8L7 7z"/>

                    </svg>

                </button>

            </form>

        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="8" class="px-6 py-16 text-center">

        <div class="flex flex-col items-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="mb-4 h-14 w-14 text-gray-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M9 17v-2a4 4 0 018 0v2M5 21h14M7 7h10M9 3h6a2 2 0 012 2v2H7V5a2 2 0 012-2z"/>

            </svg>

            <h3 class="text-lg font-semibold text-gray-700">

                No Attendance Records Found

            </h3>

            <p class="mt-2 text-sm text-gray-500">

                No employee attendance matches your current filters.
                Try changing the search criteria or mark attendance for today.

            </p>

        </div>

    </td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

{{-- Pagination --}}
@if($attendances->hasPages())

<div class="flex items-center justify-between rounded-2xl border border-gray-200 bg-white px-6 py-4 shadow-sm">

    <div class="text-sm text-gray-500">

        Showing

        <span class="font-semibold">

            {{ $attendances->firstItem() }}

        </span>

        to

        <span class="font-semibold">

            {{ $attendances->lastItem() }}

        </span>

        of

        <span class="font-semibold">

            {{ $attendances->total() }}

        </span>

        attendance records

    </div>

    <div>

        {{ $attendances->withQueryString()->links() }}

    </div>

</div>

@endif


{{-- Attendance Insight --}}
<div
    class="rounded-2xl border border-blue-100 bg-gradient-to-r from-blue-50 via-indigo-50 to-sky-50 p-6">

    <div class="flex items-start gap-4">

        <div
            class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-blue-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 17v-2a4 4 0 018 0v2M5 21h14M7 7h10M9 3h6a2 2 0 012 2v2H7V5a2 2 0 012-2z"/>

            </svg>

        </div>

        <div>

            <h3 class="text-lg font-semibold text-gray-900">

                Attendance Analytics

            </h3>

            <p class="mt-2 text-sm leading-7 text-gray-600">

                Maintaining accurate attendance records helps HR monitor workforce
                productivity, identify attendance trends, manage leave patterns,
                and ensure payroll calculations remain accurate. Regular attendance
                analysis also assists managers in recognizing punctual employees
                and improving overall organizational efficiency.

            </p>

            <div class="mt-5 flex flex-wrap gap-2">

                <span
                    class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-green-700 shadow-sm">

                    Present Tracking

                </span>

                <span
                    class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-yellow-700 shadow-sm">

                    Late Analysis

                </span>

                <span
                    class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-red-700 shadow-sm">

                    Leave Monitoring

                </span>

                <span
                    class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-indigo-700 shadow-sm">

                    Payroll Support

                </span>

                <span
                    class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-sky-700 shadow-sm">

                    HR Reports

                </span>

            </div>

        </div>

    </div>

</div>

</div>

@endsection