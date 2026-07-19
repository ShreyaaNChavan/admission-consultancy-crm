@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto">

        @if(session('success'))
            <div class="mb-5 rounded-lg bg-green-100 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border border-gray-200 bg-white p-6">

            <div class="mb-6">

                <h2 class="text-2xl font-bold">
                    My Payroll
                </h2>

                <p class="text-gray-500">
                    View your salary history and download salary slips.
                </p>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="px-4 py-3 text-left">
                                Salary Month
                            </th>

                            <th class="px-4 py-3 text-left">
                                Basic Salary
                            </th>

                            <th class="px-4 py-3 text-left">
                                Gross Salary
                            </th>

                            <th class="px-4 py-3 text-left">
                                Deductions
                            </th>

                            <th class="px-4 py-3 text-left">
                                Net Salary
                            </th>

                            <th class="px-4 py-3 text-center">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($payrolls as $payroll)

                            <tr class="border-b">

                                <td class="px-4 py-3">

                                    {{ $payroll->salary_month }}

                                </td>

                                <td class="px-4 py-3">

                                    ₹{{ number_format($payroll->basic_salary, 2) }}

                                </td>

                                <td class="px-4 py-3">

                                    ₹{{ number_format($payroll->gross_salary, 2) }}

                                </td>

                                <td class="px-4 py-3">

                                    ₹{{ number_format($payroll->deductions, 2) }}

                                </td>

                                <td class="px-4 py-3 font-semibold text-green-600">

                                    ₹{{ number_format($payroll->net_salary, 2) }}

                                </td>

                                <td class="px-4 py-3 text-center space-x-2">

                                    <a href="{{ route('employee.payroll.show', $payroll) }}"
                                        class="rounded bg-blue-600 px-3 py-1 text-white">

                                        View

                                    </a>

                                    <a href="{{ route('employee.payroll.pdf', $payroll) }}"
                                        class="rounded bg-green-600 px-3 py-1 text-white">

                                        PDF

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="py-8 text-center">

                                    No payroll records found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-6">

                {{ $payrolls->links() }}

            </div>

        </div>

    </div>

@endsection