@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">

                Generate Payroll

            </h2>

            <p class="mt-2 text-gray-500">

                Create monthly payroll records including salary, allowances,
                overtime, deductions and payment details.

            </p>

        </div>

        <a href="{{ route('payrolls.index') }}"
            class="rounded-xl border border-gray-300 bg-white px-5 py-3 font-medium text-gray-700 transition hover:bg-gray-50">

            ← Back to Payroll

        </a>

    </div>



    {{-- Validation Errors --}}
    @if ($errors->any())

        <div class="rounded-2xl border border-red-200 bg-red-50 p-5">

            <h4 class="font-semibold text-red-700">

                Please fix the following errors

            </h4>

            <ul class="mt-3 list-disc space-y-1 pl-5 text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    {{-- Payroll Form Card --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        {{-- Card Header --}}
        <div class="border-b border-gray-200 px-8 py-6">

            <h3 class="text-lg font-semibold text-gray-900">

                Payroll Information

            </h3>

            <p class="mt-1 text-sm text-gray-500">

                Fill in employee payroll details for this salary cycle.

            </p>

        </div>


        <form action="{{ route('payrolls.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                {{-- Employee --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Employee
                        <span class="text-red-500">*</span>

                    </label>

                    <select
                        id="employee_id"
                        name="employee_id"
                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        <option value="">

                            Select Employee

                        </option>

                        @foreach($employees as $employee)

                            <option
                                value="{{ $employee->id }}"
                                data-salary="{{ $employee->salary }}"
                                {{ old('employee_id')==$employee->id ? 'selected' : '' }}>

                                {{ $employee->full_name }}

                            </option>

                        @endforeach

                    </select>

                </div>



                {{-- Basic Salary --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Basic Salary

                    </label>

                    <input
                        type="text"
                        id="basic_salary"
                        readonly
                        class="w-full rounded-xl border-gray-300 bg-gray-100 font-semibold">

                </div>



                {{-- Payroll Month --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Payroll Month

                    </label>

                    <select
                        name="payroll_month"
                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @foreach([
                        'January','February','March','April','May','June',
                        'July','August','September','October','November','December'
                        ] as $month)

                            <option value="{{ $month }}">

                                {{ $month }}

                            </option>

                        @endforeach

                    </select>

                </div>



                {{-- Payroll Year --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Payroll Year

                    </label>

                    <input
                        type="number"
                        name="payroll_year"
                        value="{{ date('Y') }}"
                        class="w-full rounded-xl border-gray-300">

                </div>



                {{-- Allowances --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Allowances

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        id="allowances"
                        name="allowances"
                        value="0"
                        class="w-full rounded-xl border-gray-300">

                </div>



                {{-- Overtime --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Overtime

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        id="overtime"
                        name="overtime"
                        value="0"
                        class="w-full rounded-xl border-gray-300">

                </div>



                {{-- Deductions --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Deductions

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        id="deductions"
                        name="deductions"
                        value="0"
                        class="w-full rounded-xl border-gray-300">

                </div>



                {{-- Payment Date --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Payment Date

                    </label>

                    <input
                        type="date"
                        name="payment_date"
                        value="{{ date('Y-m-d') }}"
                        class="w-full rounded-xl border-gray-300">

                </div>

            </div>



            {{-- Salary Summary --}}
            <div class="border-t border-gray-200 bg-gray-50 px-8 py-6">

                <div
                    class="rounded-2xl border border-green-200 bg-green-50 p-6">

                    <p class="text-sm font-medium text-gray-600">

                        Net Salary

                    </p>

                    <input
                        id="net_salary"
                        readonly
                        class="mt-2 w-full border-0 bg-transparent p-0 text-4xl font-bold text-green-600">

                </div>

                            {{-- Footer --}}
            <div class="flex items-center justify-end gap-4 border-t border-gray-200 px-8 py-6">

                <a href="{{ route('payrolls.index') }}"
                    class="rounded-xl border border-gray-300 bg-white px-6 py-3 font-semibold text-gray-700 transition hover:bg-gray-100">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-3 font-semibold text-white shadow-lg transition duration-200 hover:scale-105 hover:shadow-xl">

                    Generate Payroll

                </button>

            </div>

        </form>

    </div>



    {{-- Payroll Calculation Info --}}
    <div
        class="rounded-2xl border border-blue-100 bg-gradient-to-r from-blue-50 to-indigo-50 p-6">

        <div class="flex gap-4">

            <div
                class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-blue-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3
                        3-1.343 3-3-1.343-3-3-3zm0-6v2m0
                        16v2m8-10h2M2 12H4m12.95
                        6.95l1.414 1.414M5.636
                        5.636L4.222 4.222m14.142
                        0l-1.414 1.414M5.636
                        18.364l-1.414 1.414"/>

                </svg>

            </div>

            <div>

                <h3 class="text-lg font-semibold text-gray-900">

                    Payroll Calculation

                </h3>

                <p class="mt-2 text-sm leading-7 text-gray-600">

                    The final payroll amount is calculated automatically using the
                    employee's <strong>Basic Salary</strong> along with
                    <strong>Allowances</strong> and <strong>Overtime</strong>,
                    while subtracting any <strong>Deductions</strong>.
                    This ensures accurate salary generation before payroll is saved.

                </p>

                <div class="mt-4 flex flex-wrap gap-2">

                    <span
                        class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-blue-600 shadow">

                        Basic Salary

                    </span>

                    <span
                        class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-green-600 shadow">

                        Allowances

                    </span>

                    <span
                        class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-yellow-600 shadow">

                        Overtime

                    </span>

                    <span
                        class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-red-600 shadow">

                        Deductions

                    </span>

                    <span
                        class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-indigo-600 shadow">

                        Net Salary

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>



<script>

function calculateNetSalary() {

    let basic =
        parseFloat(document.getElementById('basic_salary').value) || 0;

    let allowance =
        parseFloat(document.getElementById('allowances').value) || 0;

    let overtime =
        parseFloat(document.getElementById('overtime').value) || 0;

    let deduction =
        parseFloat(document.getElementById('deductions').value) || 0;

    let total = basic + allowance + overtime - deduction;

    document.getElementById('net_salary').value =
        '₹ ' + total.toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

}


document.getElementById('employee_id').addEventListener('change', function () {

    let salary =
        this.options[this.selectedIndex].dataset.salary || 0;

    document.getElementById('basic_salary').value = salary;

    calculateNetSalary();

});


['allowances','overtime','deductions'].forEach(function(id){

    document.getElementById(id).addEventListener(
        'input',
        calculateNetSalary
    );

});


window.addEventListener('load', function () {

    document.getElementById('employee_id')
        .dispatchEvent(new Event('change'));

});

</script>

@endsection