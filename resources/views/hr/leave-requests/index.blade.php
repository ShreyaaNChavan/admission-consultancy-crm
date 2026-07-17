@extends('layouts.app')

@section('page-title', 'Leave Management')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">

            <div>

                <h2 class="text-3xl font-bold text-gray-900">
                    Leave Management
                </h2>

                <p class="mt-2 text-sm text-gray-500">
                    Manage employee leave requests and approvals.
                </p>

            </div>

            <a href="{{ route('leave-requests.create') }}"
                class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                + Apply Leave

            </a>

        </div>

        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">

            <div class="rounded-2xl border border-yellow-200 bg-yellow-50 p-6">

                <h3 class="text-sm font-medium text-yellow-700">
                    Pending Requests
                </h3>

                <p class="mt-2 text-3xl font-bold text-yellow-800">
                    {{ $pendingCount }}
                </p>

            </div>

            <div class="rounded-2xl border border-green-200 bg-green-50 p-6">

                <h3 class="text-sm font-medium text-green-700">
                    Approved Requests
                </h3>

                <p class="mt-2 text-3xl font-bold text-green-800">
                    {{ $approvedCount }}
                </p>

            </div>

            <div class="rounded-2xl border border-red-200 bg-red-50 p-6">

                <h3 class="text-sm font-medium text-red-700">
                    Rejected Requests
                </h3>

                <p class="mt-2 text-3xl font-bold text-red-800">
                    {{ $rejectedCount }}
                </p>

            </div>

        </div>

        {{-- Search --}}
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm mb-6">

            <form method="GET" class="grid grid-cols-1 gap-4 p-6 md:grid-cols-4">

                <div class="md:col-span-2">

                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search employee..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                <div>

                    <select name="status"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <option value="">All Status</option>

                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Approved" {{ request('status') == 'Approved' ? 'selected' : '' }}>
                            Approved
                        </option>

                        <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>
                            Rejected
                        </option>

                    </select>

                </div>

                <div>

                    <button class="w-full rounded-xl bg-blue-600 py-3 font-semibold text-white hover:bg-blue-700">

                        Search

                    </button>

                </div>

            </form>

        </div>

        {{-- Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Employee
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Leave Type
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Duration
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Days
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse($leaveRequests as $leave)

                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4">

                                    <div class="font-semibold text-gray-900">

                                        {{ $leave->employee->full_name }}

                                    </div>

                                </td>

                                <td class="px-6 py-4">

                                    {{ $leave->leave_type }}

                                </td>

                                <td class="px-6 py-4 text-sm">

                                    {{ $leave->from_date->format('d M Y') }}

                                    <br>

                                    <span class="text-gray-500">

                                        to

                                    </span>

                                    <br>

                                    {{ $leave->to_date->format('d M Y') }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $leave->total_days }}

                                </td>

                                <td class="px-6 py-4">

                                    @if($leave->status == 'Approved')

                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Approved
                                        </span>

                                    @elseif($leave->status == 'Rejected')

                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                            Rejected
                                        </span>

                                    @else

                                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                            Pending
                                        </span>

                                    @endif

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('leave-requests.edit', $leave) }}"
                                            class="rounded-lg bg-indigo-500 px-3 py-2 text-xs font-semibold text-white hover:bg-indigo-600">

                                            Edit

                                        </a>

                                        <form action="{{ route('leave-requests.destroy', $leave) }}" method="POST"
                                            onsubmit="return confirm('Delete this leave request?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white hover:bg-red-700">

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="py-12 text-center text-gray-500">

                                    No leave requests found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="border-t border-gray-200 px-6 py-4">

                {{ $leaveRequests->links() }}

            </div>

        </div>

    </div>

@endsection