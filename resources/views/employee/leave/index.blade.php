@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto">

        @if(session('success'))
            <div class="mb-5 rounded-lg bg-green-100 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border border-gray-200 bg-white p-6">

            <div class="mb-6 flex items-center justify-between">

                <div>

                    <h2 class="text-2xl font-bold">
                        My Leave Requests
                    </h2>

                    <p class="text-gray-500">
                        View and manage your leave requests.
                    </p>

                </div>

                <a href="{{ route('employee.leave.create') }}"
                    class="rounded-lg bg-blue-600 px-5 py-2 text-white hover:bg-blue-700">
                    Apply Leave
                </a>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="px-4 py-3 text-left">Leave Type</th>

                            <th class="px-4 py-3 text-left">From</th>

                            <th class="px-4 py-3 text-left">To</th>

                            <th class="px-4 py-3 text-left">Days</th>

                            <th class="px-4 py-3 text-left">Status</th>

                            <th class="px-4 py-3 text-left">Remark</th>

                            <th class="px-4 py-3 text-center">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($leaveRequests as $leave)

                            <tr class="border-b">

                                <td class="px-4 py-3">

                                    {{ $leave->leave_type }}

                                </td>

                                <td class="px-4 py-3">

                                    {{ $leave->from_date->format('d M Y') }}

                                </td>

                                <td class="px-4 py-3">

                                    {{ $leave->to_date->format('d M Y') }}

                                </td>

                                <td class="px-4 py-3">

                                    {{ $leave->total_days }}

                                </td>

                                <td class="px-4 py-3">

                                    @if($leave->status == 'Pending')

                                        <span class="rounded bg-yellow-100 px-3 py-1 text-yellow-700">
                                            Pending
                                        </span>

                                    @elseif($leave->status == 'Approved')

                                        <span class="rounded bg-green-100 px-3 py-1 text-green-700">
                                            Approved
                                        </span>

                                    @else

                                        <span class="rounded bg-red-100 px-3 py-1 text-red-700">
                                            Rejected
                                        </span>

                                    @endif

                                </td>

                                <td class="px-4 py-3">

                                    {{ $leave->admin_remark ?? '-' }}

                                </td>

                                <td class="px-4 py-3 text-center">

                                    @if($leave->status == 'Pending')

                                        <form action="{{ route('employee.leave.destroy', $leave) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Cancel this leave request?')"
                                                class="rounded bg-red-500 px-3 py-1 text-white">

                                                Cancel

                                            </button>

                                        </form>

                                    @else

                                        -

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="py-8 text-center">

                                    No leave requests found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-6">

                {{ $leaveRequests->links() }}

            </div>

        </div>

    </div>

@endsection