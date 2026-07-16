@extends('layouts.app')

@section('page-title', 'Batches')

@section('content')

    <div class="space-y-6">

        {{-- Filters --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET" action="{{ route('batches.index') }}">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">

                    {{-- Search --}}
                    <div>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search batch..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Course --}}
                    <div>

                        <select name="course"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">All Courses</option>

                            @foreach($courses as $course)

                                <option value="{{ $course->id }}" {{ request('course') == $course->id ? 'selected' : '' }}>

                                    {{ $course->course_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Status --}}
                    <div>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">All Status</option>

                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                    {{-- Search --}}
                    <div>

                        <button
                            class="w-full rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">

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

                    Batches

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Manage training batches.

                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="rounded-xl bg-blue-50 px-5 py-3">

                    <p class="text-xs font-semibold uppercase tracking-wide text-blue-600">

                        Total Batches

                    </p>

                    <p class="mt-1 text-2xl font-bold text-blue-700">

                        {{ $batches->total() }}

                    </p>

                </div>

                <a href="{{ route('batches.create') }}"
                    class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                    + Add Batch

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
                                Batch
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Course
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Trainer
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Timing
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Capacity
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($batches as $batch)

                            <tr class="transition hover:bg-gray-50">

                                <td class="px-6 py-4 font-semibold text-gray-900">

                                    {{ $batch->batch_name }}

                                </td>

                                <td class="px-6 py-4 text-gray-700">

                                    {{ $batch->course?->course_name }}

                                </td>

                                <td class="px-6 py-4 text-gray-700">

                                    {{ $batch->faculty?->full_name ?? '-' }}

                                </td>

                                <td class="px-6 py-4 text-gray-700">

                                    {{ $batch->timing }}

                                </td>

                                <td class="px-6 py-4 text-gray-700">

                                    {{ $batch->capacity }}

                                </td>

                                <td class="px-6 py-4">

                                    @if($batch->status)

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

                                <td colspan="6" class="px-6 py-12 text-center">

                                    <div class="flex flex-col items-center">

                                        <svg class="mb-3 h-12 w-12 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                        </svg>

                                        <p class="text-lg font-semibold text-gray-700">

                                            No Batches Found

                                        </p>

                                        <p class="mt-1 text-sm text-gray-500">

                                            Create a batch to begin assigning students.

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