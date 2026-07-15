@extends('layouts.app')
@section('page-title', 'Leads')
@section('content')

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

                    Lead Management

                </h1>

                <p class="mt-1 text-gray-500">

                    Manage enquiries, assign counselors and convert leads into admissions.

                </p>

            </div>

            @if(
                    Auth::user()->role->role_name == 'Super Admin' ||
                    Auth::user()->role->role_name == 'Receptionist'
                )

                <a href="{{ route('leads.create') }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />

                    </svg>

                    Add Lead

                </a>

            @endif

        </div>


        {{-- Filters --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <form method="GET">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">

                    <input type="text" name="search" placeholder="Search by name or phone..."
                        value="{{ request('search') }}"
                        class="rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                    <select name="status"
                        class="rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                        <option value="">All Status</option>

                        <option value="Assigned">Assigned</option>

                        <option value="Contacted">Contacted</option>

                        <option value="Follow-up">Follow-up</option>

                        <option value="Interested">Interested</option>

                        <option value="Converted">Converted</option>

                        <option value="Not Interested">Not Interested</option>

                    </select>

                    <select name="source"
                        class="rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                        <option value="">All Sources</option>

                        <option>Website</option>

                        <option>Walk-in</option>

                        <option>Phone</option>

                        <option>WhatsApp</option>

                        <option>Referral</option>

                    </select>

                    <button
                        class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">

                        Search

                    </button>

                </div>

            </form>

        </div>


        {{-- KPI --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-4">

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <p class="text-sm text-gray-500">

                    Total Leads

                </p>

                <h2 class="mt-2 text-3xl font-bold text-gray-900">

                    {{ $leads->count() }}

                </h2>

            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <p class="text-sm text-gray-500">

                    Interested

                </p>

                <h2 class="mt-2 text-3xl font-bold text-green-600">

                    {{ $leads->where('status', 'Interested')->count() }}

                </h2>

            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <p class="text-sm text-gray-500">

                    Converted

                </p>

                <h2 class="mt-2 text-3xl font-bold text-blue-600">

                    {{ $leads->where('status', 'Converted')->count() }}

                </h2>

            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <p class="text-sm text-gray-500">

                    Pending Follow-up

                </p>

                <h2 class="mt-2 text-3xl font-bold text-orange-600">

                    {{ $leads->where('status', 'Follow-up')->count() }}

                </h2>

            </div>

        </div>
        {{-- Leads Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Lead
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Course
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Source
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Counselor
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

                        @forelse($leads as $lead)

                            <tr class="transition hover:bg-gray-50">

                                {{-- Lead --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">

                                        <div
                                            class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 font-bold text-blue-600">

                                            {{ strtoupper(substr($lead->full_name, 0, 1)) }}

                                        </div>

                                        <div>

                                            <a href="{{ route('leads.show', $lead) }}"
                                                class="font-semibold text-blue-600 hover:text-blue-800">

                                                {{ $lead->full_name }}

                                            </a>

                                            <p class="mt-1 text-sm text-gray-500">

                                                {{ $lead->lead_code }}

                                            </p>

                                        </div>

                                    </div>

                                </td>

                                {{-- Course --}}
                                <td class="px-6 py-5">

                                    <span class="font-medium text-gray-700">

                                        {{ $lead->course?->course_name ?? '-' }}

                                    </span>

                                </td>

                                {{-- Source --}}
                                <td class="px-6 py-5">

                                    @php

                                        $sourceClass = match ($lead->source?->source_name) {

                                            'Website' => 'bg-blue-100 text-blue-700',

                                            'Phone' => 'bg-green-100 text-green-700',

                                            'WhatsApp' => 'bg-emerald-100 text-emerald-700',

                                            'Walk-in' => 'bg-orange-100 text-orange-700',

                                            default => 'bg-gray-100 text-gray-700'

                                        };

                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $sourceClass }}">

                                        {{ $lead->source?->source_name ?? '-' }}

                                    </span>

                                </td>

                                {{-- Counselor --}}
                                <td class="px-6 py-5">

                                    @if($lead->counselor)

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-100 font-semibold text-indigo-700">

                                                {{ strtoupper(substr($lead->counselor->name, 0, 1)) }}

                                            </div>

                                            <span class="font-medium text-gray-700">

                                                {{ $lead->counselor->name }}

                                            </span>

                                        </div>

                                    @else

                                        <span class="text-gray-400">

                                            Not Assigned

                                        </span>

                                    @endif

                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-5">

                                    @php

                                        $statusClass = match ($lead->status) {

                                            'Interested' => 'bg-green-100 text-green-700',

                                            'Converted' => 'bg-blue-100 text-blue-700',

                                            'Contacted' => 'bg-cyan-100 text-cyan-700',

                                            'Assigned' => 'bg-indigo-100 text-indigo-700',

                                            'Follow-up' => 'bg-yellow-100 text-yellow-700',

                                            'Not Interested' => 'bg-red-100 text-red-700',

                                            default => 'bg-gray-100 text-gray-700'

                                        };

                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">

                                        {{ $lead->status }}

                                    </span>

                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-5 text-center">

                                    <a href="{{ route('leads.show', $lead) }}"
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
                                                d="M9 17v-2a4 4 0 014-4h6" />

                                        </svg>

                                        <h3 class="text-lg font-semibold text-gray-700">

                                            No Leads Found

                                        </h3>

                                        <p class="mt-2 text-sm text-gray-500">

                                            New enquiries will appear here.

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