@extends('layouts.app')

@section('page-title', 'Admissions')

@section('content')

    <div class="space-y-6">
        {{-- Filters --}}
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET" action="{{ route('admissions.index') }}">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">

                    {{-- Search --}}
                    <div>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Student..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Course Filter --}}
                    <div>

                        <select name="course"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">
                                All Courses
                            </option>

                            @foreach($courses as $course)

                                <option value="{{ $course->id }}" {{ request('course') == $course->id ? 'selected' : '' }}>

                                    {{ $course->course_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Status Filter --}}
                    <div>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">
                                All Status
                            </option>

                            <option value="Active">
                                Active
                            </option>

                            <option value="Completed">
                                Completed
                            </option>

                            <option value="Pending">
                                Pending
                            </option>

                            <option value="Dropped">
                                Dropped
                            </option>

                        </select>

                    </div>

                    {{-- Search Button --}}
                    <div>

                        <button type="submit"
                            class="w-full rounded-xl bg-slate-900 px-5 py-3 font-medium text-white transition hover:bg-slate-800">

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

        {{-- Header --}}
        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-3xl font-bold text-gray-900">
                    Students
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Manage all admitted students
                </p>

            </div>

            <div class="rounded-xl bg-blue-50 px-5 py-3">

                <p class="text-xs font-medium uppercase tracking-wide text-blue-600">
                    Total Students
                </p>

                <p class="mt-1 text-2xl font-bold text-blue-700">
                    {{ $students->count() }}
                </p>

            </div>

        </div>

        {{-- Students Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Student Code
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Student Name
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Course
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($students as $student)

                            <tr class="transition hover:bg-gray-50">

                                <td class="px-6 py-4">

                                    <a href="{{ route('admissions.show', $student) }}"
                                        class="font-semibold text-blue-600 hover:text-blue-800 hover:underline">

                                        {{ $student->student_code }}

                                    </a>

                                </td>

                                <td class="px-6 py-4">

                                    <div class="font-medium text-gray-900">

                                        {{ $student->full_name }}

                                    </div>

                                </td>

                                <td class="px-6 py-4 text-gray-600">

                                    {{ $student->course?->course_name ?? '-' }}

                                </td>

                                <td class="px-6 py-4">

                                    @if($student->status == 'Active')

                                        <span
                                            class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Active
                                        </span>

                                    @elseif($student->status == 'Completed')

                                        <span
                                            class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                            Completed
                                        </span>

                                    @elseif($student->status == 'Dropped')

                                        <span
                                            class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                            Dropped
                                        </span>

                                    @elseif($student->status == 'Pending')

                                        <span
                                            class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                            Pending
                                        </span>

                                    @else

                                        <span
                                            class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                                            {{ $student->status }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="px-6 py-12 text-center">

                                    <div class="flex flex-col items-center">

                                        <svg class="mb-3 h-12 w-12 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M17 20h5V4H2v16h5m10 0v-5a3 3 0 00-3-3H10a3 3 0 00-3 3v5m10 0H7" />

                                        </svg>

                                        <p class="text-lg font-semibold text-gray-700">
                                            No Students Found
                                        </p>

                                        <p class="mt-1 text-sm text-gray-500">
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