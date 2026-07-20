@extends('layouts.app')

@section('page-title', 'Apply Leave')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-900">
            Apply for Leave
        </h2>

        <p class="mt-2 text-gray-500">
            Submit your leave request for approval.
        </p>

    </div>

    <form action="{{ route('employee.leave.store') }}" method="POST">

        @csrf

        {{-- Logged-in Employee --}}
        <input
            type="hidden"
            name="employee_id"
            value="{{ auth()->user()->employee->id }}">

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            {{-- Card Header --}}
            <div class="border-b border-gray-200 px-8 py-5">

                <h3 class="text-lg font-semibold text-gray-900">
                    Leave Details
                </h3>

            </div>

            {{-- Form --}}
            <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                {{-- Employee --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Employee
                    </label>

                    <input
                        type="text"
                        readonly
                        value="{{ auth()->user()->employee->full_name }}"
                        class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3">

                </div>

                {{-- Leave Type --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Leave Type
                    </label>

                    <select
                        name="leave_type"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-[#465FFF] focus:ring-2 focus:ring-[#465FFF]/20">

                        <option value="">Select Leave Type</option>

                        <option value="Casual">Casual Leave</option>
                        <option value="Sick">Sick Leave</option>
                        <option value="Annual">Annual Leave</option>
                        <option value="Emergency">Emergency Leave</option>
                        <option value="Unpaid">Unpaid Leave</option>

                    </select>

                    @error('leave_type')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                {{-- From --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        From Date
                    </label>

                    <input
                        type="date"
                        id="from_date"
                        name="from_date"
                        value="{{ old('from_date') }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-[#465FFF] focus:ring-2 focus:ring-[#465FFF]/20">

                </div>

                {{-- To --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        To Date
                    </label>

                    <input
                        type="date"
                        id="to_date"
                        name="to_date"
                        value="{{ old('to_date') }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-[#465FFF] focus:ring-2 focus:ring-[#465FFF]/20">

                </div>

                {{-- Total Days --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Total Days
                    </label>

                    <input
                        type="number"
                        id="total_days"
                        readonly
                        class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3">

                </div>

                {{-- Reason --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Reason
                    </label>

                    <textarea
                        name="reason"
                        rows="5"
                        required
                        placeholder="Please describe the reason for your leave..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-[#465FFF] focus:ring-2 focus:ring-[#465FFF]/20">{{ old('reason') }}</textarea>

                    @error('reason')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

            </div>

            {{-- Footer --}}
            <div class="flex justify-end gap-4 border-t border-gray-200 px-8 py-5">

                <a
                    href="{{ route('employee.leave.index') }}"
                    class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-[#465FFF] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#3B4FE0]">

                    Submit Leave Request

                </button>

            </div>

        </div>

    </form>

</div>

@endsection

@push('scripts')

<script>

function calculateDays() {

    const from = document.getElementById('from_date').value;
    const to = document.getElementById('to_date').value;

    if (from && to) {

        const start = new Date(from);
        const end = new Date(to);

        const diff = Math.floor((end - start) / (1000 * 60 * 60 * 24)) + 1;

        document.getElementById('total_days').value = diff > 0 ? diff : 0;

    } else {

        document.getElementById('total_days').value = '';

    }

}

document.getElementById('from_date').addEventListener('change', calculateDays);
document.getElementById('to_date').addEventListener('change', calculateDays);

</script>

@endpush