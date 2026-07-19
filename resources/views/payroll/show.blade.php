@extends('layouts.app')

@section('page-title', 'Salary Slip')

@section('content')

<div class="max-w-4xl mx-auto space-y-8">

    {{-- Page Header --}}
    <div>

        <h2 class="text-3xl font-bold text-gray-900">
            Employee Salary Slip
        </h2>

        <p class="mt-2 text-sm text-gray-500">
            View payroll details, salary breakdown and payment information.
        </p>

    </div>

    {{-- Salary Card --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        {{-- Card Header --}}
        <div class="flex items-center justify-between border-b border-gray-200 px-8 py-5">

            <div>

                <h3 class="text-lg font-semibold text-gray-900">
                    XYZ Education ERP
                </h3>

                <p class="text-sm text-gray-500">
                    Payroll Summary
                </p>

            </div>

            <div class="flex gap-3">

                <a href="{{ route('payrolls.index') }}"
                    class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                    Back

                </a>

                <a href="{{ route('payrolls.pdf', $payroll) }}"
                    class="rounded-xl bg-green-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-green-700">

                    Download PDF

                </a>

            </div>

        </div>

        {{-- Card Body --}}
        <div class="p-8 space-y-8">

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                <div>

                    <h3 class="mb-4 text-lg font-semibold text-gray-900">
                        Employee Details
                    </h3>

                    <table class="w-full text-sm">

                        <tr>
                            <td class="py-2 font-medium text-gray-600">Employee</td>
                            <td>{{ $payroll->employee->full_name }}</td>
                        </tr>

                        <tr>
                            <td class="py-2 font-medium text-gray-600">Employee ID</td>
                            <td>{{ $payroll->employee->id }}</td>
                        </tr>

                        <tr>
                            <td class="py-2 font-medium text-gray-600">Designation</td>
                            <td>{{ optional($payroll->employee->designation)->designation_name ?? '-' }}</td>
                        </tr>

                    </table>

                </div>

                <div>

                    <h3 class="mb-4 text-lg font-semibold text-gray-900">
                        Payroll Details
                    </h3>

                    <table class="w-full text-sm">

                        <tr>
                            <td class="py-2 font-medium text-gray-600">Month</td>
                            <td>{{ $payroll->payroll_month }}</td>
                        </tr>

                        <tr>
                            <td class="py-2 font-medium text-gray-600">Year</td>
                            <td>{{ $payroll->payroll_year }}</td>
                        </tr>

                        <tr>
                            <td class="py-2 font-medium text-gray-600">Payment Date</td>
                            <td>{{ $payroll->payment_date }}</td>
                        </tr>

                        <tr>
                            <td class="py-2 font-medium text-gray-600">Status</td>
                            <td>{{ $payroll->status }}</td>
                        </tr>

                    </table>

                </div>

            </div>

            {{-- Salary Breakdown --}}
            <div>

                <h3 class="mb-4 text-lg font-semibold text-gray-900">
                    Salary Breakdown
                </h3>

                <div class="overflow-hidden rounded-xl border border-gray-200">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-5 py-3 text-left font-semibold text-gray-700">
                                    Description
                                </th>

                                <th class="px-5 py-3 text-right font-semibold text-gray-700">
                                    Amount
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr class="border-t">

                                <td class="px-5 py-3">
                                    Basic Salary
                                </td>

                                <td class="px-5 py-3 text-right">
                                    ₹ {{ number_format($payroll->basic_salary, 2) }}
                                </td>

                            </tr>

                            <tr class="border-t">

                                <td class="px-5 py-3">
                                    Allowances
                                </td>

                                <td class="px-5 py-3 text-right">
                                    ₹ {{ number_format($payroll->allowances, 2) }}
                                </td>

                            </tr>

                            <tr class="border-t">

                                <td class="px-5 py-3">
                                    Overtime
                                </td>

                                <td class="px-5 py-3 text-right">
                                    ₹ {{ number_format($payroll->overtime, 2) }}
                                </td>

                            </tr>

                            <tr class="border-t">

                                <td class="px-5 py-3 text-red-600">
                                    Deductions
                                </td>

                                <td class="px-5 py-3 text-right text-red-600">
                                    - ₹ {{ number_format($payroll->deductions, 2) }}
                                </td>

                            </tr>

                            <tr class="border-t bg-green-50 font-semibold">

                                <td class="px-5 py-3">
                                    Net Salary
                                </td>

                                <td class="px-5 py-3 text-right text-green-700">
                                    ₹ {{ number_format($payroll->net_salary, 2) }}
                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        {{-- Card Footer --}}
        <div class="flex justify-between border-t border-gray-200 bg-gray-50 px-8 py-8 text-center text-sm text-gray-700">

            <div>

                ______________________

                <p class="mt-2">
                    Employee Signature
                </p>

            </div>

            <div>

                ______________________

                <p class="mt-2">
                    Authorized Signature
                </p>

            </div>

        </div>

    </div>

    {{-- Information Card --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

        <div class="flex items-start gap-4">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-green-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>

                </svg>

            </div>

            <div class="flex-1">

                <h3 class="text-lg font-semibold text-gray-900">
                    Payroll Information
                </h3>

                <p class="mt-2 text-sm leading-7 text-gray-600">
                    This salary slip is a system-generated payroll document containing employee salary details,
                    allowances, deductions and final payable amount for the selected payroll period.
                </p>

                <div class="mt-6 grid grid-cols-2 gap-4 md:grid-cols-4">

                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">
                        <p class="text-xs uppercase tracking-wide text-gray-500">Basic</p>
                        <p class="mt-2 font-semibold">₹ {{ number_format($payroll->basic_salary,2) }}</p>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">
                        <p class="text-xs uppercase tracking-wide text-gray-500">Allowances</p>
                        <p class="mt-2 font-semibold text-green-600">₹ {{ number_format($payroll->allowances,2) }}</p>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">
                        <p class="text-xs uppercase tracking-wide text-gray-500">Deductions</p>
                        <p class="mt-2 font-semibold text-red-600">₹ {{ number_format($payroll->deductions,2) }}</p>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">
                        <p class="text-xs uppercase tracking-wide text-gray-500">Net Salary</p>
                        <p class="mt-2 font-semibold text-blue-600">₹ {{ number_format($payroll->net_salary,2) }}</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection