@extends('layouts.app')

@section('page-title', 'Edit Leave Request')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-900">
            Edit Leave Request
        </h2>

        <p class="mt-2 text-sm text-gray-500">
            Review and update the leave request.
        </p>

    </div>

    <form action="{{ route('leave-requests.update', $leaveRequest) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            {{-- Header --}}
            <div class="border-b border-gray-200 px-8 py-5">

                <h3 class="text-lg font-semibold text-gray-900">

                    Leave Request Details

                </h3>

            </div>

            {{-- Form --}}
            <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                {{-- Employee --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Employee
                    </label>

                    <select
                        name="employee_id"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @foreach($employees as $employee)

                            <option
                                value="{{ $employee->id }}"
                                {{ old('employee_id', $leaveRequest->employee_id) == $employee->id ? 'selected' : '' }}>

                                {{ $employee->full_name }}

                            </option>

                        @endforeach

                    </select>

                    @error('employee_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Leave Type --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Leave Type
                    </label>

                    <select
                        name="leave_type"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @foreach([
                            'Casual',
                            'Sick',
                            'Annual',
                            'Maternity',
                            'Paternity',
                            'Emergency',
                            'Unpaid'
                        ] as $type)

                            <option
                                value="{{ $type }}"
                                {{ old('leave_type', $leaveRequest->leave_type) == $type ? 'selected' : '' }}>

                                {{ $type }}

                            </option>

                        @endforeach

                    </select>

                    @error('leave_type')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                {{-- From Date --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        From Date
                    </label>

                    <input
                        type="date"
                        id="from_date"
                        name="from_date"
                        value="{{ old('from_date', $leaveRequest->from_date->format('Y-m-d')) }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    @error('from_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                {{-- To Date --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        To Date
                    </label>

                    <input
                        type="date"
                        id="to_date"
                        name="to_date"
                        value="{{ old('to_date', $leaveRequest->to_date->format('Y-m-d')) }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    @error('to_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Total Days --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Total Days
                    </label>

                    <input
                        id="total_days"
                        type="number"
                        value="{{ $leaveRequest->total_days }}"
                        readonly
                        class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3">

                </div>

                {{-- Status --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <option value="Pending"
                            {{ old('status', $leaveRequest->status) == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Approved"
                            {{ old('status', $leaveRequest->status) == 'Approved' ? 'selected' : '' }}>
                            Approved
                        </option>

                        <option value="Rejected"
                            {{ old('status', $leaveRequest->status) == 'Rejected' ? 'selected' : '' }}>
                            Rejected
                        </option>

                    </select>

                </div>

                {{-- Reason --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Reason
                    </label>

                    <textarea
                        name="reason"
                        rows="4"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('reason', $leaveRequest->reason) }}</textarea>

                    @error('reason')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Admin Remark --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Admin Remark
                    </label>

                    <textarea
                        name="admin_remark"
                        rows="3"
                        placeholder="Optional remarks from HR/Admin..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('admin_remark', $leaveRequest->admin_remark) }}</textarea>

                </div>

                {{-- Approved At --}}
                @if($leaveRequest->approved_at)

                <div class="md:col-span-2">

                    <div class="rounded-xl bg-green-50 border border-green-200 p-4">

                        <p class="text-sm font-medium text-green-700">

                            Approved/Updated On:
                            <strong>{{ $leaveRequest->approved_at->format('d M Y h:i A') }}</strong>

                        </p>

                    </div>

                </div>

                @endif

            </div>

            {{-- Footer --}}
            <div class="flex justify-end gap-4 border-t border-gray-200 px-8 py-5">

                <a
                    href="{{ route('leave-requests.index') }}"
                    class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-100">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">

                    Update Leave Request

                </button>

            </div>

        </div>

    </form>

</div>

@endsection

@push('scripts')

<script>

function calculateDays(){

    let from=document.getElementById('from_date').value;
    let to=document.getElementById('to_date').value;

    if(from && to){

        let start=new Date(from);
        let end=new Date(to);

        let diff=Math.floor((end-start)/(1000*60*60*24))+1;

        document.getElementById('total_days').value=diff>0?diff:0;

    }

}

document.getElementById('from_date').addEventListener('change',calculateDays);
document.getElementById('to_date').addEventListener('change',calculateDays);

calculateDays();

</script>

@endpush