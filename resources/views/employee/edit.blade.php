@extends('layouts.app')

@section('page-title', 'Edit Employee')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-900">

            Edit Employee

        </h2>

        <p class="mt-2 text-sm font-medium text-gray-500">

            Update employee information.

        </p>

    </div>

    <form action="{{ route('employees.update',$employee) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            {{-- Card Header --}}
            <div class="border-b border-gray-200 px-8 py-5">

                <h3 class="text-lg font-semibold text-gray-900">

                    Employee Information

                </h3>

            </div>

            {{-- Form --}}
            <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                {{-- Full Name --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Full Name

                    </label>

                    <input
                        type="text"
                        name="full_name"
                        value="{{ old('full_name',$employee->full_name) }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                {{-- Department --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Department

                    </label>

                    <select
                        name="department_id"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @foreach($departments as $department)

                            <option
                                value="{{ $department->id }}"
                                {{ old('department_id',$employee->department_id)==$department->id ? 'selected' : '' }}>

                                {{ $department->department_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Designation --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Designation

                    </label>

                    <select
                        name="designation_id"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @foreach($designations as $designation)

                            <option
                                value="{{ $designation->id }}"
                                {{ old('designation_id',$employee->designation_id)==$designation->id ? 'selected' : '' }}>

                                {{ $designation->designation_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- System Role --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        System Role

                    </label>

                    <select
                        name="role_id"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @foreach($roles as $role)

                            <option
                                value="{{ $role->id }}"
                                {{ old('role_id',$employee->role_id)==$role->id ? 'selected' : '' }}>

                                {{ $role->role_name }}

                            </option>

                        @endforeach

                    </select>

                </div>
                                {{-- Phone Number --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Phone Number

                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $employee->phone) }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                {{-- Email --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Email Address

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $employee->email) }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                {{-- Joining Date --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Joining Date

                    </label>

                    <input
                        type="date"
                        name="joining_date"
                        value="{{ old('joining_date', $employee->joining_date) }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                {{-- Monthly Salary --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Monthly Salary (₹)

                    </label>

                    <input
                        type="number"
                        name="salary"
                        value="{{ old('salary', $employee->salary) }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                {{-- Status --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Status

                    </label>

                    <select
                        name="status"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <option
                            value="Active"
                            {{ old('status', $employee->status) == 'Active' ? 'selected' : '' }}>

                            Active

                        </option>

                        <option
                            value="Inactive"
                            {{ old('status', $employee->status) == 'Inactive' ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>

            </div>

            {{-- Footer --}}
            <div class="flex justify-end gap-4 border-t border-gray-200 px-8 py-5">

                <a
                    href="{{ route('employees.index') }}"
                    class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                    Update Employee

                </button>

            </div>

        </div>

    </form>

</div>

@endsection