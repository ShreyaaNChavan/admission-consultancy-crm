@extends('layouts.app')

@section('page-title', 'Fee Structures')

@section('content')

    <div class="space-y-6">

        {{-- Filters --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET" action="{{ route('fee-structures.index') }}">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                    {{-- Search --}}
                    <div>

                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search fee structure..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Status --}}
                    <div>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">All Status</option>

                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                    {{-- Search Button --}}
                    <div>

                        <button
                            class="w-full rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

        {{-- Success Message --}}
        @if(session('success'))

            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">

                {{ session('success') }}

            </div>

        @endif

        {{-- Header --}}
        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-3xl font-bold text-gray-900">

                    Fee Structures

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Manage course fee plans.

                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="rounded-xl bg-blue-50 px-5 py-3">

                    <p class="text-xs font-semibold uppercase tracking-wide text-blue-600">

                        Total Fee Plans

                    </p>

                    <p class="mt-1 text-2xl font-bold text-blue-700">

                        {{ $fees->count() }}

                    </p>

                </div>

                <a href="{{ route('fee-structures.create') }}"
                    class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                    + Add Fee Structure

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
                                Course
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Fee Plan
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Amount
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($fees as $fee)

                            <tr class="transition hover:bg-gray-50">

                                <td class="px-6 py-4 font-medium text-gray-900">

                                    {{ $fee->course->course_name }}

                                </td>

                                <td class="px-6 py-4 text-gray-700">

                                    {{ $fee->fee_name }}

                                </td>

                                <td class="px-6 py-4 font-semibold text-green-600">

                                    ₹{{ number_format($fee->amount, 2) }}

                                </td>

                                <td class="px-6 py-4">

                                    @if($fee->status)

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

                                <td colspan="4" class="px-6 py-12 text-center">

                                    <div class="flex flex-col items-center">

                                        <svg class="mb-3 h-12 w-12 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M12 8c-3.866 0-7 3.134-7 7h14c0-3.866-3.134-7-7-7zm0-6a2 2 0 110 4 2 2 0 010-4z" />

                                        </svg>

                                        <p class="text-lg font-semibold text-gray-700">

                                            No Fee Structures Found

                                        </p>

                                        <p class="mt-1 text-sm text-gray-500">

                                            Create your first fee structure.

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
        <div>

            {{ $fees->withQueryString()->links() }}

        </div>

    </div>

@endsection