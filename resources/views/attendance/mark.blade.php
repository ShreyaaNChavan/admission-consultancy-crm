@extends('layouts.app')

@section('page-title', 'Mark Attendance')

@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <h1 class="text-3xl font-bold text-gray-900">
                    Mark Attendance
                </h1>

                <p class="mt-1 text-sm font-medium text-gray-500">
                    Record attendance for students in this batch.
                </p>

            </div>

            <a href="{{ route('attendance.index') }}"
                class="inline-flex items-center rounded-xl border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                ← Back

            </a>

        </div>

        {{-- Batch Card --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                <div class="flex items-center gap-5">

                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-2xl font-bold text-blue-600">

                        {{ strtoupper(substr($batch->batch_name, 0, 1)) }}

                    </div>

                    <div>

                        <h2 class="text-2xl font-bold text-gray-900">

                            {{ $batch->batch_name }}

                        </h2>

                        <p class="mt-1 text-gray-500">

                            {{ $batch->course?->course_name }}

                        </p>

                    </div>

                </div>

                <div class="rounded-xl bg-blue-50 px-6 py-4">

                    <p class="text-xs font-semibold uppercase tracking-wide text-blue-600">

                        Students

                    </p>

                    <p class="mt-1 text-2xl font-bold text-blue-700">

                        {{ $students->count() }}

                    </p>

                </div>

            </div>

        </div>

        {{-- Attendance Form --}}
        <form action="{{ route('attendance.store', $batch) }}" method="POST">

            @csrf

            <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-gray-200 px-8 py-5">

                    <div class="flex flex-col gap-5 md:flex-row md:items-end">

                        <div class="w-full md:w-72">

                            <label class="mb-2 block text-sm font-semibold text-gray-700">

                                Attendance Date

                            </label>

                            <input type="date" name="attendance_date" value="{{ date('Y-m-d') }}"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        </div>

                    </div>

                </div>

                {{-- Students Table --}}
                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="border-b border-gray-200 bg-gray-50">

                            <tr>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                    Student

                                </th>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                    Attendance Status

                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse($students as $student)

                                <tr class="transition hover:bg-gray-50">

                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-4">

                                            <div
                                                class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 font-semibold text-blue-600">

                                                {{ strtoupper(substr($student->full_name, 0, 1)) }}

                                            </div>

                                            <div>

                                                <p class="font-semibold text-gray-900">

                                                    {{ $student->full_name }}

                                                </p>

                                                <p class="text-sm text-gray-500">

                                                    {{ $student->student_code }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    <td class="px-6 py-4">

                                        <select name="attendance[{{ $student->id }}]"
                                            class="w-44 rounded-xl border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                                            <option value="Present">
                                                ✓ Present
                                            </option>

                                            <option value="Absent">
                                                ✕ Absent
                                            </option>

                                            <option value="Late">
                                                🕒 Late
                                            </option>

                                        </select>
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="2" class="px-6 py-12 text-center">

                                        <div class="flex flex-col items-center">

                                            <svg class="mb-4 h-12 w-12 text-gray-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                    d="M9 12h6m-6 4h6M8 6h8M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />

                                            </svg>

                                            <p class="text-lg font-semibold text-gray-700">

                                                No Students Found

                                            </p>

                                            <p class="mt-2 text-sm text-gray-500">

                                                There are no students assigned to this batch.

                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{-- Footer --}}
                <div class="flex justify-end border-t border-gray-200 px-8 py-5">

                    <button type="submit"
                        class="rounded-xl bg-green-600 px-8 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-green-700">

                        Save Attendance

                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection