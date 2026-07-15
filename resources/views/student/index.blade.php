@extends('layouts.app')
@section('page-title', 'Students')
@section('content')

    <div class="space-y-6">

        {{-- Success Message --}}
        @if(session('success'))

            <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">

                {{ session('success') }}

            </div>

        @endif


        {{-- Header --}}
        <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <h1 class="text-3xl font-bold text-gray-900">

                    Students

                </h1>

                <p class="mt-1 text-gray-500">

                    Manage admitted students, batches and fee records.

                </p>

            </div>

        </div>


        {{-- Filters --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-5">

                    {{-- Search --}}
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search student..."
                        class="rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                    {{-- Course --}}
                    <select name="course"
                        class="rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                        <option value="">All Courses</option>

                        @foreach($courses ?? [] as $course)

                            <option value="{{ $course->id }}" {{ request('course') == $course->id ? 'selected' : '' }}>

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                    {{-- Batch --}}
                    <select name="batch"
                        class="rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                        <option value="">All Batches</option>

                        @foreach($batches ?? [] as $batch)

                            <option value="{{ $batch->id }}" {{ request('batch') == $batch->id ? 'selected' : '' }}>

                                {{ $batch->batch_name }}

                            </option>

                        @endforeach

                    </select>

                    {{-- Status --}}
                    <select name="status"
                        class="rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                        <option value="">All Status</option>

                        <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                        <option value="Dropped" {{ request('status') == 'Dropped' ? 'selected' : '' }}>
                            Dropped
                        </option>

                    </select>

                    {{-- Search Button --}}
                    <button
                        class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">

                        Search

                    </button>

                </div>

            </form>

        </div>


        {{-- KPI Cards --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-4">

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <p class="text-sm text-gray-500">

                    Total Students

                </p>

                <h2 class="mt-2 text-3xl font-bold text-gray-900">

                    {{ $students->count() }}

                </h2>

            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <p class="text-sm text-gray-500">

                    Active

                </p>

                <h2 class="mt-2 text-3xl font-bold text-green-600">

                    {{ $students->where('status', 'Active')->count() }}

                </h2>

            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <p class="text-sm text-gray-500">

                    Completed

                </p>

                <h2 class="mt-2 text-3xl font-bold text-blue-600">

                    {{ $students->where('status', 'Completed')->count() }}

                </h2>

            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <p class="text-sm text-gray-500">

                    Pending Fees

                </p>

                <h2 class="mt-2 text-3xl font-bold text-orange-600">

                    {{ $students->filter(fn($s) => optional($s->invoice)->status == 'Pending')->count() }}

                </h2>

            </div>

        </div>
        {{-- Students Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Student
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Course
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Batch
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Fee Status
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($students as $student)

                            <tr class="transition hover:bg-gray-50">

                                {{-- Student --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">

                                        <div
                                            class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 font-bold text-blue-600">

                                            {{ strtoupper(substr($student->full_name, 0, 1)) }}

                                        </div>

                                        <div>

                                            <a href="{{ route('students.show', $student) }}"
                                                class="font-semibold text-blue-600 hover:text-blue-800">

                                                {{ $student->full_name }}

                                            </a>

                                            <p class="mt-1 text-sm text-gray-500">

                                                {{ $student->student_code }}

                                            </p>

                                        </div>

                                    </div>

                                </td>

                                {{-- Course --}}
                                <td class="px-6 py-5">

                                    <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">

                                        {{ $student->course?->course_name ?? '-' }}

                                    </span>

                                </td>

                                {{-- Batch --}}
                                <td class="px-6 py-5">

                                    @if($student->batch)

                                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">

                                            {{ $student->batch->batch_name }}

                                        </span>

                                    @else

                                        <span class="text-gray-400">

                                            -

                                        </span>

                                    @endif

                                </td>

                                {{-- Fee Status --}}
                                <td class="px-6 py-5">

                                    @php

                                        $feeStatus = $student->invoice?->status ?? 'Not Generated';

                                        $feeClass = match ($feeStatus) {

                                            'Paid' => 'bg-green-100 text-green-700',

                                            'Partial' => 'bg-yellow-100 text-yellow-700',

                                            'Pending' => 'bg-red-100 text-red-700',

                                            default => 'bg-gray-100 text-gray-700'

                                        };

                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $feeClass }}">

                                        {{ $feeStatus }}

                                    </span>

                                </td>

                                {{-- Student Status --}}
                                <td class="px-6 py-5">

                                    @php

                                        $statusClass = match ($student->status) {

                                            'Active' => 'bg-green-100 text-green-700',

                                            'Completed' => 'bg-blue-100 text-blue-700',

                                            'Dropped' => 'bg-red-100 text-red-700',

                                            default => 'bg-gray-100 text-gray-700'

                                        };

                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">

                                        {{ $student->status }}

                                    </span>

                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-5 text-center">

                                    <a href="{{ route('students.show', $student) }}"
                                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-blue-700">

                                        View

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="px-6 py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <svg class="mb-4 h-12 w-12 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M5 13l4 4L19 7" />

                                        </svg>

                                        <h3 class="text-lg font-semibold text-gray-700">

                                            No Students Found

                                        </h3>

                                        <p class="mt-2 text-sm text-gray-500">

                                            Students will appear here after admissions are completed.

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