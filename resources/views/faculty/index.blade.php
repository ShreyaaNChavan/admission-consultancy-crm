@extends('layouts.app')

@section('page-title', 'Faculty')

@section('content')

    <div class="space-y-6">

        {{-- Filters --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET" action="{{ route('faculties.index') }}">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">

                    {{-- Search --}}
                    <div>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search faculty..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Status --}}
                    <div>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">All Status</option>

                            <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>

                                Inactive

                            </option>

                        </select>

                    </div>

                    <div></div>

                    {{-- Search Button --}}
                    <div>

                        <button
                            class="w-full rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-800">

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

                    Faculty

                </h2>

                <p class="mt-1 text-sm font-medium text-gray-500">

                    Manage trainers and instructors.

                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="rounded-xl bg-blue-50 px-5 py-3">

                    <p class="text-xs font-semibold uppercase tracking-wider text-blue-600">

                        Total Faculty

                    </p>

                    <p class="mt-1 text-2xl font-bold text-blue-700">

                        {{ $faculties->total() }}

                    </p>

                </div>

                <!-- <a href="{{ route('faculties.create') }}"
                    class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                    + Add Faculty

                </a> -->

            </div>

        </div>

        {{-- Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Faculty Code

                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Faculty Name

                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Qualification

                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Specialization

                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Phone

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

                        @forelse($faculties as $faculty)

                            <tr class="transition hover:bg-gray-50">

                                <td class="px-6 py-4 font-semibold text-blue-600">

                                    {{ $faculty->faculty_code }}

                                </td>

                                <td class="px-6 py-4">

                                    <div class="font-semibold text-gray-900">

                                        {{ $faculty->full_name }}

                                    </div>

                                    <div class="text-sm text-gray-500">

                                        {{ $faculty->email }}

                                    </div>

                                </td>

                                <td class="px-6 py-4 text-gray-600">

                                    {{ $faculty->qualification }}

                                </td>

                                <td class="px-6 py-4 text-gray-600">

                                    {{ $faculty->specialization }}

                                </td>

                                <td class="px-6 py-4 text-gray-600">

                                    {{ $faculty->phone }}

                                </td>

                                <td class="px-6 py-4">

                                    @if($faculty->status == 'Active')

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

                                <td class="px-6 py-4 text-center">

                                    <a href="{{ route('faculties.edit', $faculty) }}"
                                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">

                                        Edit

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="px-6 py-12 text-center">

                                    <div class="flex flex-col items-center">

                                        <svg class="mb-3 h-12 w-12 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0v6" />

                                        </svg>

                                        <p class="text-lg font-semibold text-gray-700">

                                            No Faculty Found

                                        </p>

                                        <p class="mt-1 text-sm text-gray-500">

                                            Faculty records will appear here.

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

            {{ $faculties->links() }}

        </div>

    </div>

@endsection