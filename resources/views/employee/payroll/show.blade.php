@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="rounded-2xl border border-gray-200 bg-white p-8">

        <div class="flex items-center justify-between mb-8">

            <div>

                <h2 class="text-3xl font-bold">
                    Salary Slip
                </h2>

                <p class="text-gray-500">
                    {{ $payroll->salary_month }}
                </p>

            </div>

            <a href="{{ route('employee.payroll.pdf', $payroll) }}"
                class="rounded-lg bg-green-600 px-5 py-2 text-white hover:bg-green-700">

                Download PDF

            </a>

        </div>

        <div class="grid grid-cols-2 gap-8">

            <div>

                <h3 class="font-semibold text-lg mb-3">
                    Employee Details
                </h3>

                <table class="w-full">

                    <tr>
                        <td class="py-2 font-medium">Employee</td>
                        <td>{{ $payroll->employee->full_name }}</td>
                    </tr>

                    <tr>
                        <td class="py-2 font-medium">Employee Code</td>
                        <td>{{ $payroll->employee->employee_code }}</td>
                    </tr>

                    <tr>
                        <td class="py-2 font-medium">Department</td>
                        <td>{{ $payroll->employee->department->department_name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <td class="py-2 font-medium">Designation</td>
                        <td>{{ $payroll->employee->designation->designation_name ?? '-' }}</td>
                    </tr>

                </table>

            </div>

            <div>

                <h3 class="font-semibold text-lg mb-3">
                    Payroll Details
                </h3>

                <table class="w-full">

                    <tr>
                        <td class="py-2 font-medium">Salary Month</td>
                        <td>{{ $payroll->salary_month }}</td>
                    </tr>

                    <tr>
                        <td class="py-2 font-medium">Payment Date</td>
                        <td>{{ $payroll->payment_date }}</td>
                    </tr>

                </table>

            </div>

        </div>

        <hr class="my-8">

        <div class="grid grid-cols-3 gap-6 text-center">

            <div class="rounded-xl bg-blue-50 p-6">

                <p class="text-gray-500">
                    Basic Salary
                </p>

                <h3 class="text-2xl font-bold">

                    ₹{{ number_format($payroll->basic_salary,2) }}

                </h3>

            </div>

            <div class="rounded-xl bg-red-50 p-6">

                <p class="text-gray-500">
                    Deductions
                </p>

                <h3 class="text-2xl font-bold text-red-600">

                    ₹{{ number_format($payroll->deductions,2) }}

                </h3>

            </div>

            <div class="rounded-xl bg-green-50 p-6">

                <p class="text-gray-500">
                    Net Salary
                </p>

                <h3 class="text-2xl font-bold text-green-600">

                    ₹{{ number_format($payroll->net_salary,2) }}

                </h3>

            </div>

        </div>

        <div class="mt-8 text-right">

            <a href="{{ route('employee.payroll.index') }}"
                class="rounded-lg bg-gray-600 px-5 py-2 text-white">

                Back

            </a>

        </div>

    </div>

</div>

@endsection