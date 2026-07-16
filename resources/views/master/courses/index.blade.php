@extends('layouts.app')

@section('page-title', 'Courses')

@section('content')

    <div class="space-y-6">

        {{-- Search & Filters --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET" action="{{ route('courses.index') }}">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">

                    <div>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search course..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">All Status</option>

                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                    <div>

                        <button
                            class="w-full rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">

                            Search

                        </button>

                    </div>

                    <div>

                        <a href="{{ route('courses.index') }}"
                            class="flex h-full items-center justify-center rounded-xl border border-gray-300 px-5 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-100">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

        {{-- Header --}}
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <h2 class="text-3xl font-bold text-gray-900">

                    Courses

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Manage available courses.

                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="rounded-xl bg-blue-50 px-6 py-4">

                    <p class="text-xs font-semibold uppercase tracking-wide text-blue-600">

                        Total Courses

                    </p>

                    <p class="mt-1 text-2xl font-bold text-blue-700">

                        {{ $courses->total() }}

                    </p>

                </div>

                <a href="{{ route('courses.create') }}"
                    class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                    + Add Course

                </a>

            </div>

        </div>

        {{-- Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Sr.No.
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Code
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Course Name
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Duration
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($courses as $index => $course)

                            <tr class="transition hover:bg-gray-50">

                                <td class="px-6 py-4 text-sm font-medium text-gray-700">

                                    {{ $courses->firstItem() + $index }}

                                </td>

                                <td class="px-6 py-4 text-sm font-medium text-gray-800">

                                    {{ $course->course_code }}

                                </td>

                                <td class="px-6 py-4">

                                    <div class="text-sm font-medium text-gray-800">

                                        {{ $course->course_name }}

                                    </div>

                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">

                                    {{ $course->duration }} Months

                                </td>

                                <td class="px-6 py-4">

                                    @if($course->status)

                                        <span
                                            class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                            Active

                                        </span>

                                    @else

                                        <span
                                            class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                            Inactive

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="px-6 py-12 text-center">

                                    <div class="flex flex-col items-center">

                                        <svg class="mb-3 h-12 w-12 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M12 6.253v13m0-13C10.832 5.483 8.403 5 6 5c-1.657 0-3.25.23-4.75.659v13.091C2.75 18.23 4.343 18 6 18c2.403 0 4.832.483 6 1.253m0-13C13.168 5.483 15.597 5 18 5c1.657 0 3.25.23 4.75.659v13.091C21.25 18.23 19.657 18 18 18c-2.403 0-4.832.483-6 1.253" />

                                        </svg>

                                        <p class="text-lg font-semibold text-gray-700">

                                            No Courses Found

                                        </p>

                                        <p class="mt-1 text-sm text-gray-500">

                                            Create your first course to get started.

                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>

        {{-- Pagination --}}
        @if ($courses->hasPages())

            <div
                class="flex flex-col items-center justify-between gap-4 rounded-2xl border border-gray-200 bg-white px-6 py-5 shadow-sm md:flex-row">

                <p class="text-sm font-medium text-gray-500">

                    Showing

                    <span class="font-semibold text-gray-800">

                        {{ $courses->firstItem() }}

                    </span>

                    to

                    <span class="font-semibold text-gray-800">

                        {{ $courses->lastItem() }}

                    </span>

                    of

                    <span class="font-semibold text-gray-800">

                        {{ $courses->total() }}

                    </span>

                    courses

                </p>

                {{ $courses->links() }}

            </div>

        @endif

    </div>

@endsection