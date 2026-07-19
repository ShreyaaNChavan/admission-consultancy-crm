@extends('layouts.app')

@section('page-title', 'Edit Payroll')

@section('content')

<div class="max-w-4xl mx-auto space-y-8">

    {{-- Header --}}
    <div>

        <h2 class="text-3xl font-bold text-gray-900">
            Edit Payroll
        </h2>

        <p class="mt-2 text-sm text-gray-500">
            Update employee payroll details, salary components and payment information.
        </p>

    </div>

    {{-- Form Card --}}
    <form action="{{ route('payrolls.update', $payroll) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            {{-- Card Header --}}
            <div class="border-b border-gray-200 px-8 py-5">

                <h3 class="text-lg font-semibold text-gray-900">
                    Payroll Information
                </h3>

            </div>

            {{-- Card Body --}}
            <div class="p-8 space-y-6">

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    {{-- Employee --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Employee
                            <span class="text-red-500">*</span>
                        </label>

                        <select name="employee_id"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            @foreach($employees as $employee)

                                <option value="{{ $employee->id }}"
                                    {{ old('employee_id', $payroll->employee_id) == $employee->id ? 'selected' : '' }}>

                                    {{ $employee->full_name }}

                                </option>

                            @endforeach

                        </select>

                        @error('employee_id')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Payment Date --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Payment Date
                            <span class="text-red-500">*</span>
                        </label>

                        <input type="date"
                            name="payment_date"
                            value="{{ old('payment_date', $payroll->payment_date) }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('payment_date')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Payroll Month --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Payroll Month
                            <span class="text-red-500">*</span>
                        </label>

                        <input type="text"
                            name="payroll_month"
                            value="{{ old('payroll_month', $payroll->payroll_month) }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('payroll_month')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Payroll Year --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Payroll Year
                            <span class="text-red-500">*</span>
                        </label>

                        <input type="number"
                            name="payroll_year"
                            value="{{ old('payroll_year', $payroll->payroll_year) }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('payroll_year')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Basic Salary --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Basic Salary
                        </label>

                        <input type="number"
                            step="0.01"
                            name="basic_salary"
                            value="{{ old('basic_salary', $payroll->basic_salary) }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Allowances --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Allowances
                        </label>

                        <input type="number"
                            step="0.01"
                            name="allowances"
                            value="{{ old('allowances', $payroll->allowances) }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Overtime --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Overtime
                        </label>

                        <input type="number"
                            step="0.01"
                            name="overtime"
                            value="{{ old('overtime', $payroll->overtime) }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Deductions --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Deductions
                        </label>

                        <input type="number"
                            step="0.01"
                            name="deductions"
                            value="{{ old('deductions', $payroll->deductions) }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Status --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Status
                        </label>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="Pending" {{ old('status', $payroll->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Paid" {{ old('status', $payroll->status) == 'Paid' ? 'selected' : '' }}>Paid</option>

                        </select>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="flex justify-end gap-4 border-t border-gray-200 bg-gray-50 px-8 py-5">

                <a href="{{ route('payrolls.index') }}"
                    class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                    Cancel

                </a>

                <button type="submit"
                    class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                    Update Payroll

                </button>

            </div>

        </div>

    </form>

    {{-- Information Card --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

        <div class="flex items-start gap-4">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6M5 5h14v14H5z"/>

                </svg>

            </div>

            <div class="flex-1">

                <h3 class="text-lg font-semibold text-gray-900">
                    Payroll Guidelines
                </h3>

                <p class="mt-2 text-sm leading-7 text-gray-600">
                    Review salary details carefully before updating. Ensure that the basic salary,
                    allowances, overtime and deductions are accurate so the net salary is calculated correctly.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection