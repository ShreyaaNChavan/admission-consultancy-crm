@extends('layouts.app')
@section('content')

<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                Payroll Management
            </h2>

            <p class="mt-1 text-gray-500">
                Generate, manage and monitor monthly employee payroll records.
            </p>

        </div>

        <a href="{{ route('payrolls.create') }}"
            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 font-semibold text-white shadow-lg transition hover:scale-105 hover:shadow-xl">

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

            Generate Payroll

        </a>

    </div>


    {{-- Alerts --}}
    @if(session('success'))

        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">

            {{ session('error') }}

        </div>

    @endif


    {{-- Statistics --}}
    <div class="grid gap-6 md:grid-cols-4">

        <div class="rounded-2xl border border-blue-100 bg-white p-6 shadow-sm">

            <p class="text-sm text-gray-500">

                Total Payrolls

            </p>

            <h3 class="mt-2 text-3xl font-bold text-blue-600">

                {{ $payrolls->total() }}

            </h3>

        </div>

        <div class="rounded-2xl border border-green-100 bg-white p-6 shadow-sm">

            <p class="text-sm text-gray-500">

                Paid Records

            </p>

            <h3 class="mt-2 text-3xl font-bold text-green-600">

                {{ $payrolls->where('status','Paid')->count() }}

            </h3>

        </div>

        <div class="rounded-2xl border border-yellow-100 bg-white p-6 shadow-sm">

            <p class="text-sm text-gray-500">

                Pending

            </p>

            <h3 class="mt-2 text-3xl font-bold text-yellow-500">

                {{ $payrolls->where('status','Pending')->count() }}

            </h3>

        </div>

        <div class="rounded-2xl border border-indigo-100 bg-white p-6 shadow-sm">

            <p class="text-sm text-gray-500">

                Current Year

            </p>

            <h3 class="mt-2 text-3xl font-bold text-indigo-600">

                {{ date('Y') }}

            </h3>

        </div>

    </div>



    {{-- Search Card --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <form method="GET">

            <div class="grid gap-4 md:grid-cols-4">

                <div>

                    <label class="mb-2 block text-sm font-semibold text-gray-700">

                        Search Employee

                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Employee name..."
                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                </div>

                <div>

                    <label class="mb-2 block text-sm font-semibold text-gray-700">

                        Payroll Month

                    </label>

                    <select
                        name="month"
                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        <option value="">

                            All Months

                        </option>

                        @foreach([
                        'January','February','March','April','May','June',
                        'July','August','September','October','November','December'
                        ] as $month)

                            <option
                                value="{{ $month }}"
                                @selected(request('month')==$month)>

                                {{ $month }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="mb-2 block text-sm font-semibold text-gray-700">

                        Payroll Year

                    </label>

                    <input
                        type="number"
                        name="year"
                        value="{{ request('year') }}"
                        placeholder="2026"
                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                </div>

                <div class="flex items-end">

                    <button
                        class="w-full rounded-xl bg-blue-600 py-3 font-semibold text-white transition hover:bg-blue-700">

                        Search Payroll

                    </button>

                </div>

            </div>

        </form>

    </div>



    {{-- Payroll Table --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        <div class="border-b border-gray-200 px-6 py-5">

            <h3 class="text-lg font-semibold text-gray-900">

                Payroll Records

            </h3>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">

                            Employee

                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">

                            Month

                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">

                            Year

                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">

                            Net Salary

                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">

                            Payment Date

                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">

                            Status

                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600">

                            Actions

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">
                
                @forelse($payrolls as $payroll)

<tr class="transition hover:bg-gray-50">

    {{-- Employee --}}
    <td class="px-6 py-5">

        <div class="flex items-center gap-3">

            <div
                class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 font-bold text-blue-700">

                {{ strtoupper(substr($payroll->employee->full_name,0,1)) }}

            </div>

            <div>

                <p class="font-semibold text-gray-900">

                    {{ $payroll->employee->full_name }}

                </p>

                <p class="text-sm text-gray-500">

                    {{ $payroll->employee->employee_code }}

                </p>

            </div>

        </div>

    </td>


    {{-- Month --}}
    <td class="px-6 py-5 text-gray-700">

        {{ $payroll->payroll_month }}

    </td>


    {{-- Year --}}
    <td class="px-6 py-5 text-gray-700">

        {{ $payroll->payroll_year }}

    </td>


    {{-- Salary --}}
    <td class="px-6 py-5">

        <span class="font-semibold text-green-600">

            ₹ {{ number_format($payroll->net_salary,2) }}

        </span>

    </td>


    {{-- Payment Date --}}
    <td class="px-6 py-5 text-gray-700">

        {{ \Carbon\Carbon::parse($payroll->payment_date)->format('d M Y') }}

    </td>


    {{-- Status --}}
    <td class="px-6 py-5">

        @if($payroll->status == 'Paid')

            <span
                class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                Paid

            </span>

        @elseif($payroll->status == 'Pending')

            <span
                class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                Pending

            </span>

        @elseif($payroll->status == 'Processing')

            <span
                class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                Processing

            </span>

        @else

            <span
                class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">

                {{ $payroll->status }}

            </span>

        @endif

    </td>


    {{-- Actions --}}
    <td class="px-6 py-5">

        <div class="flex justify-center gap-2">

            {{-- View --}}
            <a href="{{ route('payrolls.show',$payroll) }}"
                class="rounded-lg bg-blue-100 p-2 text-blue-600 transition hover:bg-blue-600 hover:text-white">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z"/>

                </svg>

            </a>


            {{-- Edit --}}
            <a href="{{ route('payrolls.edit',$payroll) }}"
                class="rounded-lg bg-yellow-100 p-2 text-yellow-600 transition hover:bg-yellow-500 hover:text-white">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>

                </svg>

            </a>


            {{-- Delete --}}
            <form action="{{ route('payrolls.destroy',$payroll) }}"
                method="POST"
                onsubmit="return confirm('Delete Payroll Record?')">

                @csrf
                @method('DELETE')

                <button
                    class="rounded-lg bg-red-100 p-2 text-red-600 transition hover:bg-red-600 hover:text-white">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/>

                    </svg>

                </button>

            </form>

        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="7" class="px-6 py-16">

        <div class="flex flex-col items-center">

            <div
                class="mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-blue-50">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-10 w-10 text-blue-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 9V7a5 5 0 00-10 0v2M5 9h14v10H5z"/>

                </svg>

            </div>

            <h3 class="text-lg font-semibold text-gray-800">

                No Payroll Records Found

            </h3>

            <p class="mt-2 text-gray-500">

                Generate your first payroll to start managing employee salaries.

            </p>

        </div>

    </td>

</tr>

@endforelse

</tbody>

</table>

</div>

@if($payrolls->hasPages())

<div class="border-t border-gray-200 px-6 py-5">

    {{ $payrolls->links() }}

</div>

@endif

</div>

</div>

@endsection