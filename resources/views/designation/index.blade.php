@extends('layouts.app')

@section('page-title', 'Designations')

@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-3xl font-bold text-gray-900">
                    Designations
                </h2>

                <p class="mt-2 text-sm text-gray-500">
                    Manage employee designations across your organization.
                </p>

            </div>

            <a href="{{ route('designations.create') }}"
                class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />

                </svg>

                Add Designation

            </a>

        </div>


        {{-- Success Message --}}
        @if(session('success'))

            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">

                {{ session('success') }}

            </div>

        @endif


        {{-- Statistics --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

            {{-- Total --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <p class="text-sm font-medium text-gray-500">
                    Total Designations
                </p>

                <h3 class="mt-2 text-3xl font-bold text-gray-900">
                    {{ $designations->total() }}
                </h3>

            </div>

            {{-- Active --}}
            <div class="rounded-2xl border border-green-200 bg-green-50 p-6 shadow-sm">

                <p class="text-sm font-medium text-green-700">
                    Active
                </p>

                <h3 class="mt-2 text-3xl font-bold text-green-700">
                    {{ $designations->where('status', 1)->count() }}
                </h3>

            </div>

            {{-- Inactive --}}
            <div class="rounded-2xl border border-red-200 bg-red-50 p-6 shadow-sm">

                <p class="text-sm font-medium text-red-700">
                    Inactive
                </p>

                <h3 class="mt-2 text-3xl font-bold text-red-700">
                    {{ $designations->where('status', 0)->count() }}
                </h3>

            </div>

        </div>


        {{-- Search --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                    {{-- Search --}}
                    <div>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search designation..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Status --}}
                    <div>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">
                                All Status
                            </option>

                            <option value="1" @selected(request('status') == '1')>
                                Active
                            </option>

                            <option value="0" @selected(request('status') == '0')>
                                Inactive
                            </option>

                        </select>

                    </div>

                    {{-- Button --}}
                    <button
                        class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">

                        Search

                    </button>

                </div>

            </form>

        </div>


        {{-- Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Designation
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white"></tbody>
                    @forelse($designations as $designation)

                        <tr class="transition hover:bg-gray-50">

                            {{-- Designation --}}
                            <td class="px-6 py-4">

                                <div class="font-semibold text-gray-900">

                                    {{ $designation->designation_name }}

                                </div>

                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if($designation->status)

                                    <span
                                        class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                        Active

                                    </span>

                                @else

                                    <span
                                        class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                        Inactive

                                    </span>

                                @endif

                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    {{-- Edit --}}
                                    <a href="{{ route('designations.edit', $designation) }}"
                                        class="inline-flex items-center rounded-lg bg-amber-500 p-2 text-white transition hover:bg-amber-600"
                                        title="Edit">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.586-9.414a2
                                                        2 0 112.828 2.828L12 14l-4
                                                        1 1-4 8.414-8.414z" />

                                        </svg>

                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('designations.destroy', $designation) }}" method="POST"
                                        onsubmit="return confirm('Delete this designation?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center rounded-lg bg-red-600 p-2 text-white transition hover:bg-red-700"
                                            title="Delete">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2
                                                            2 0 0116.138
                                                            21H7.862a2 2 0
                                                            01-1.995-1.858L5
                                                            7m5 4v6m4-6v6M9
                                                            7V4a1 1 0
                                                            011-1h4a1 1 0
                                                            011 1v3m-7
                                                            0h8" />

                                            </svg>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="px-6 py-14">

                                <div class="flex flex-col items-center justify-center">

                                    <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-blue-50">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6M7
                                                        4h10a2 2 0 012
                                                        2v12a2 2 0
                                                        01-2 2H7a2
                                                        2 0 01-2-2V6a2
                                                        2 0 012-2z" />

                                        </svg>

                                    </div>

                                    <h3 class="text-lg font-semibold text-gray-800">

                                        No Designations Found

                                    </h3>

                                    <p class="mt-2 max-w-md text-center text-sm text-gray-500">

                                        Create your first designation to organize employees,
                                        trainers, faculty members, and administrative staff
                                        efficiently.

                                    </p>

                                    <a href="{{ route('designations.create') }}"
                                        class="mt-6 inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />

                                        </svg>

                                        Add Designation

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            @if($designations->hasPages())

                <div class="border-t border-gray-200 px-6 py-4">

                    {{ $designations->withQueryString()->links() }}

                </div>

            @endif

        </div>

    </div>

@endsection




