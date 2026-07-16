@extends('layouts.app')

@section('page-title', 'Lead Sources')

@section('content')

    <div class="space-y-6">

        {{-- Filters --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET" action="{{ route('lead-sources.index') }}">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                    <div>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search lead source..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

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

                    Lead Sources

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Manage enquiry sources for admissions.

                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="rounded-xl bg-blue-50 px-5 py-3">

                    <p class="text-xs font-semibold uppercase tracking-wide text-blue-600">

                        Total Sources

                    </p>

                    <p class="mt-1 text-2xl font-bold text-blue-700">

                        {{ $sources->count() }}

                    </p>

                </div>

                <a href="{{ route('lead-sources.create') }}"
                    class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">

                    + Add Source

                </a>

            </div>

        </div>

        {{-- Success Message --}}
        @if(session('success'))

            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">

                {{ session('success') }}

            </div>

        @endif

        {{-- Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Source Name

                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Status

                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($sources as $source)

                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 font-medium text-gray-900">

                                    {{ $source->source_name }}

                                </td>

                                <td class="px-6 py-4">

                                    @if($source->status)

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

                                <td colspan="2" class="px-6 py-14 text-center">

                                    <div class="flex flex-col items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 h-12 w-12 text-gray-300" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M17 20h5V4H2v16h5m10 0v-6H7v6m10 0H7" />

                                        </svg>

                                        <p class="text-lg font-semibold text-gray-700">

                                            No Lead Sources Found

                                        </p>

                                        <p class="mt-1 text-sm text-gray-500">

                                            Create your first lead source to start tracking enquiries.

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

            {{ $sources->withQueryString()->links() }}

        </div>

    </div>

@endsection