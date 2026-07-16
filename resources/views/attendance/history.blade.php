@extends('layouts.app')
@section('page-title', 'Attendance History')
@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    Attendance History
                </h1>

                <p class="mt-1 text-sm font-medium text-gray-500">
                    View attendance records for the selected batch.
                </p>
            </div>

            <a href="{{ route('attendance.index') }}"
                class="inline-flex items-center rounded-xl border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                ← Back

            </a>

        </div>

        {{-- Batch Information --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-xl font-semibold text-gray-900">
                        Batch Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Basic information about this training batch.
                    </p>

                </div>

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-xl font-bold text-blue-600">

                    {{ strtoupper(substr($batch->batch_name, 0, 1)) }}

                </div>

            </div>

            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-3">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Batch Name
                    </p>

                    <p class="mt-1 text-lg font-semibold text-gray-900">
                        {{ $batch->batch_name }}
                    </p>

                </div>

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Course
                    </p>

                    <p class="mt-1 text-lg font-semibold text-gray-900">
                        {{ $batch->course?->course_name }}
                    </p>

                </div>

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Total Records
                    </p>

                    <p class="mt-1 text-lg font-semibold text-blue-600">
                        {{ $attendances->count() }}
                    </p>

                </div>

            </div>

        </div>

        {{-- Attendance Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="border-b border-gray-200 px-6 py-5">

                <h2 class="text-lg font-semibold text-gray-900">
                    Attendance Records
                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-gray-50 border-b border-gray-200">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Date
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Student Name
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Attendance Status
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($attendances as $attendance)

                            <tr class="transition hover:bg-gray-50">

                                <td class="px-6 py-4 text-sm font-medium text-gray-700">

                                    {{ \Carbon\Carbon::parse($attendance->attendance_date)->format('d M Y') }}

                                </td>

                                <td class="px-6 py-4">

                                    <div class="font-semibold text-gray-900">

                                        {{ $attendance->student?->full_name }}

                                    </div>

                                </td>

                                <td class="px-6 py-4">

                                    @if($attendance->status == 'Present')

                                        <span
                                            class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                            Present

                                        </span>

                                    @elseif($attendance->status == 'Absent')

                                        <span
                                            class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                            Absent

                                        </span>

                                    @else

                                        <span
                                            class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                                            Late

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3" class="px-6 py-14 text-center">

                                    <div class="flex flex-col items-center">

                                        <svg class="mb-4 h-14 w-14 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />

                                        </svg>

                                        <h3 class="text-lg font-semibold text-gray-700">
                                            No Attendance Records
                                        </h3>

                                        <p class="mt-2 text-sm text-gray-500">
                                            Attendance history will appear here once attendance is marked.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection