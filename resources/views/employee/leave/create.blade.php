@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    @if ($errors->any())
        <div class="mb-5 rounded-lg bg-red-100 p-4 text-red-700">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-2xl border border-gray-200 bg-white p-6">

        <div class="mb-6">

            <h2 class="text-2xl font-bold">
                Apply for Leave
            </h2>

            <p class="text-gray-500">
                Submit your leave request for approval.
            </p>

        </div>

        <form action="{{ route('employee.leave.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                <div>

                    <label class="mb-2 block font-medium">
                        Leave Type
                    </label>

                    <select
                        name="leave_type"
                        class="w-full rounded-lg border-gray-300"
                        required>

                        <option value="">Select Leave Type</option>

                        <option value="Casual">Casual Leave</option>
                        <option value="Sick">Sick Leave</option>
                        <option value="Annual">Annual Leave</option>
                        <option value="Emergency">Emergency Leave</option>
                        <option value="Maternity">Maternity Leave</option>
                        <option value="Paternity">Paternity Leave</option>
                        <option value="Unpaid">Unpaid Leave</option>

                    </select>

                </div>

                <div></div>

                <div>

                    <label class="mb-2 block font-medium">
                        From Date
                    </label>

                    <input
                        type="date"
                        name="from_date"
                        value="{{ old('from_date') }}"
                        class="w-full rounded-lg border-gray-300"
                        required>

                </div>

                <div>

                    <label class="mb-2 block font-medium">
                        To Date
                    </label>

                    <input
                        type="date"
                        name="to_date"
                        value="{{ old('to_date') }}"
                        class="w-full rounded-lg border-gray-300"
                        required>

                </div>

                <div class="md:col-span-2">

                    <label class="mb-2 block font-medium">
                        Reason
                    </label>

                    <textarea
                        name="reason"
                        rows="5"
                        class="w-full rounded-lg border-gray-300"
                        placeholder="Enter reason for leave..."
                        required>{{ old('reason') }}</textarea>

                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="rounded-lg bg-brand-500 px-6 py-2 text-white">

                    Submit Request

                </button>

                <a
                    href="{{ route('employee.leave.index') }}"
                    class="rounded-lg bg-gray-500 px-6 py-2 text-white">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection