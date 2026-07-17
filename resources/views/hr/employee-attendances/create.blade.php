@extends('layouts.app')

@section('page-title', 'Mark Employee Attendance')

@section('content')

    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">

                Mark Employee Attendance

            </h2>

            <p class="mt-2 text-sm font-medium text-gray-500">

                Record employee attendance, check-in, check-out and attendance status.

            </p>

        </div>

        <form action="{{ route('employee-attendances.store') }}" method="POST">

            @csrf

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-gray-200 px-8 py-5">

                    <h3 class="text-lg font-semibold text-gray-900">

                        Attendance Information

                    </h3>

                </div>

                {{-- Form --}}
                <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                    {{-- Employee --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Employee

                        </label>

                        <select name="employee_id" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">

                                Select Employee

                            </option>

                            @foreach($employees as $employee)

                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>

                                    {{ $employee->full_name }}

                                </option>

                            @endforeach

                        </select>

                        @error('employee_id')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- Attendance Date --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Attendance Date

                        </label>

                        <input type="date" name="attendance_date"
                            value="{{ old('attendance_date', now()->format('Y-m-d')) }}" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('attendance_date')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- Check In --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Check In Time

                        </label>

                        <input type="time" name="check_in" value="{{ old('check_in') }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('check_in')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- Check Out --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Check Out Time

                        </label>

                        <input type="time" name="check_out" value="{{ old('check_out') }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('check_out')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- Attendance Status --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Attendance Status

                        </label>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="Present" {{ old('status', 'Present') == 'Present' ? 'selected' : '' }}>
                                Present
                            </option>

                            <option value="Late" {{ old('status') == 'Late' ? 'selected' : '' }}>
                                Late
                            </option>

                            <option value="Half Day" {{ old('status') == 'Half Day' ? 'selected' : '' }}>
                                Half Day
                            </option>

                            <option value="Leave" {{ old('status') == 'Leave' ? 'selected' : '' }}>
                                Leave
                            </option>

                            <option value="Absent" {{ old('status') == 'Absent' ? 'selected' : '' }}>
                                Absent
                            </option>

                        </select>

                        @error('status')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- Remarks --}}
                    <div class="md:col-span-2">

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Remarks

                        </label>

                        <textarea name="remarks" rows="4" placeholder="Optional remarks..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('remarks') }}</textarea>

                        @error('remarks')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                </div>

                {{-- Footer --}}
                <div class="flex justify-end gap-4 border-t border-gray-200 px-8 py-5">

                    <a href="{{ route('employee-attendances.index') }}"
                        class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                        Save Attendance

                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection