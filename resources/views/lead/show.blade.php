@extends('layouts.app')

@section('page-title', 'Lead Details')

@section('content')

    <div class="space-y-6">

        @if(session('success'))

            <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">

                {{ session('success') }}

            </div>

        @endif

        {{-- Header --}}
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <h1 class="text-3xl font-bold text-gray-900">

                    Lead Details

                </h1>

                <p class="mt-1 text-gray-500">

                    View and manage lead information.

                </p>

            </div>

            <div class="flex flex-wrap gap-3">

                <a href="{{ route('leads.index') }}"
                    class="rounded-xl border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                    Back

                </a>

            </div>

        </div>



        {{-- Lead Profile --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                <div class="flex items-center gap-5">

                    <div
                        class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-100 text-3xl font-bold text-blue-600">

                        {{ strtoupper(substr($lead->full_name, 0, 1)) }}

                    </div>

                    <div>

                        <h2 class="text-2xl font-bold text-gray-900">

                            {{ $lead->full_name }}

                        </h2>

                        <p class="mt-1 text-gray-500">

                            Lead Code :
                            <span class="font-medium text-gray-700">

                                {{ $lead->lead_code }}

                            </span>

                        </p>

                        <p class="text-gray-500">

                            {{ $lead->course?->course_name ?? '-' }}

                        </p>

                    </div>

                </div>

                <div>

                    @php

                        $badge = match ($lead->status) {

                            'Interested' => 'bg-green-100 text-green-700',

                            'Contacted' => 'bg-blue-100 text-blue-700',

                            'Follow-up' => 'bg-yellow-100 text-yellow-700',

                            'Assigned' => 'bg-indigo-100 text-indigo-700',

                            'Converted' => 'bg-emerald-100 text-emerald-700',

                            'Not Interested' => 'bg-red-100 text-red-700',

                            default => 'bg-gray-100 text-gray-700'

                        };

                    @endphp

                    <span class="inline-flex rounded-full px-4 py-2 text-sm font-semibold {{ $badge }}">

                        {{ $lead->status }}

                    </span>

                </div>

            </div>

            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

                <div>

                    <p class="text-sm font-medium text-gray-500">

                        Phone

                    </p>

                    <p class="mt-1 text-base font-semibold text-gray-900">

                        {{ $lead->phone }}

                    </p>

                </div>

                <div>

                    <p class="text-sm font-medium text-gray-500">

                        Email

                    </p>

                    <p class="mt-1 text-base font-semibold text-gray-900">

                        {{ $lead->email ?? '-' }}

                    </p>

                </div>

                <div>

                    <p class="text-sm font-medium text-gray-500">

                        Lead Source

                    </p>

                    <p class="mt-1 text-base font-semibold text-gray-900">

                        {{ $lead->source?->source_name ?? '-' }}

                    </p>

                </div>

                <div>

                    <p class="text-sm font-medium text-gray-500">

                        Assigned Counselor

                    </p>

                    <p class="mt-1 text-base font-semibold text-gray-900">

                        {{ $lead->counselor?->name ?? 'Not Assigned' }}

                    </p>

                </div>

            </div>

            @if($lead->remarks)

                <div class="mt-8 rounded-xl border border-gray-200 bg-gray-50 p-5">

                    <h4 class="mb-2 font-semibold text-gray-900">

                        Remarks

                    </h4>

                    <p class="leading-7 text-gray-600">

                        {{ $lead->remarks }}

                    </p>

                </div>

            @endif

        </div>

        {{-- Actions --}}
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

            {{-- Assign Counselor --}}
            @if(
                    Auth::user()->role->role_name == 'Super Admin' ||
                    Auth::user()->role->role_name == 'Sales Manager'
                )

                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                    <div class="mb-6">

                        <h3 class="text-xl font-semibold text-gray-900">

                            Assign Counselor

                        </h3>

                        <p class="mt-1 text-sm text-gray-500">

                            Allocate this lead to a counselor for further follow-up.

                        </p>

                    </div>

                    <form action="{{ route('leads.assign', $lead) }}" method="POST">

                        @csrf

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Counselor

                        </label>

                        <select name="assigned_to"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                            <option value="">
                                Select Counselor
                            </option>

                            @foreach($counselors as $counselor)

                                <option value="{{ $counselor->id }}" {{ $lead->assigned_to == $counselor->id ? 'selected' : '' }}>

                                    {{ $counselor->name }}

                                </option>

                            @endforeach

                        </select>

                        <button type="submit"
                            class="mt-5 w-full rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">

                            Save Assignment

                        </button>

                    </form>

                </div>

            @endif


            {{-- Convert Admission --}}
            @if(
                    $lead->status == 'Interested' &&
                    Auth::user()->role->role_name == 'Super Admin'
                )

                <div class="rounded-2xl border border-green-200 bg-green-50 p-6 shadow-sm">

                    <div class="mb-5">

                        <h3 class="text-xl font-semibold text-green-800">

                            Ready For Admission

                        </h3>

                        <p class="mt-1 text-sm text-green-700">

                            This lead is interested and can now be converted into a student admission.

                        </p>

                    </div>

                    <div class="mb-6 rounded-xl bg-white p-4">

                        <div class="flex justify-between py-2">

                            <span class="text-gray-500">
                                Lead
                            </span>

                            <span class="font-medium">
                                {{ $lead->lead_code }}
                            </span>

                        </div>

                        <div class="flex justify-between py-2">

                            <span class="text-gray-500">
                                Student
                            </span>

                            <span class="font-medium">
                                {{ $lead->full_name }}
                            </span>

                        </div>

                        <div class="flex justify-between py-2">

                            <span class="text-gray-500">
                                Course
                            </span>

                            <span class="font-medium">
                                {{ $lead->course?->course_name }}
                            </span>

                        </div>

                    </div>

                    <form action="{{ route('admissions.convert', $lead) }}" method="POST">

                        @csrf

                        <button
                            class="w-full rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-green-700">

                            Convert To Admission

                        </button>

                    </form>

                </div>

            @endif

        </div>


        {{-- Follow-up History --}}
<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="mb-6">

        <h2 class="text-xl font-semibold text-gray-900">

            Follow-up History

        </h2>

        <p class="mt-1 text-sm text-gray-500">

            Complete communication timeline with this lead.

        </p>

    </div>

    @if($followups->count())

        <div class="relative">

            <div class="absolute left-5 top-0 h-full w-0.5 bg-gray-200"></div>

            <div class="space-y-6">

                @foreach($followups as $followup)

                    <div class="relative flex gap-5">

                        {{-- Timeline Dot --}}
                        <div
                            class="relative z-10 flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white">

                            @switch($followup->followup_type)

                                @case('Call')
                                    📞
                                    @break

                                @case('WhatsApp')
                                    💬
                                    @break

                                @case('Email')
                                    ✉️
                                    @break

                                @case('Meeting')
                                    👥
                                    @break

                                @default
                                    📝

                            @endswitch

                        </div>

                        {{-- Card --}}
                        <div
                            class="flex-1 rounded-xl border border-gray-200 bg-gray-50 p-5">

                            <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">

                                <div>

                                    <h4 class="font-semibold text-gray-900">

                                        {{ $followup->followup_type }}

                                    </h4>

                                    <p class="text-sm text-gray-500">

                                        {{ $followup->followup_date }}

                                    </p>

                                </div>

                                <span
                                    class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                                    {{ $followup->counselor?->name }}

                                </span>

                            </div>

                            <div class="mt-4 space-y-3">

                                <div>

                                    <p class="text-sm font-medium text-gray-500">

                                        Remarks

                                    </p>

                                    <p class="mt-1 text-gray-700">

                                        {{ $followup->remarks }}

                                    </p>

                                </div>

                                <div>

                                    <p class="text-sm font-medium text-gray-500">

                                        Next Follow-up

                                    </p>

                                    <p class="mt-1 font-medium text-gray-900">

                                        {{ $followup->next_followup ?? '-' }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @else

        <div
            class="rounded-xl border border-dashed border-gray-300 py-12 text-center">

            <h3 class="text-lg font-semibold text-gray-700">

                No Follow-ups Yet

            </h3>

            <p class="mt-2 text-sm text-gray-500">

                Follow-up records will appear here after counselors start interacting with this lead.

            </p>

        </div>

    @endif

    <hr class="my-8">

            @if(Auth::user()->role->role_name == 'Counselor')

<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="mb-6">

        <h2 class="text-xl font-semibold text-gray-900">

            Add Follow-up

        </h2>

        <p class="mt-1 text-sm text-gray-500">

            Record your communication with this lead.

        </p>

    </div>

    <form action="{{ route('followups.store',$lead) }}" method="POST">

        @csrf

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- Follow-up Date --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">

                    Follow-up Date

                </label>

                <input
                    type="date"
                    name="followup_date"
                    required
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

            </div>

            {{-- Communication --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">

                    Communication Type

                </label>

                <select
                    name="followup_type"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    <option>Call</option>
                    <option>WhatsApp</option>
                    <option>Email</option>
                    <option>Walk-in</option>
                    <option>Meeting</option>

                </select>

            </div>

            {{-- Remarks --}}
            <div class="lg:col-span-2">

                <label class="mb-2 block text-sm font-medium text-gray-700">

                    Remarks

                </label>

                <textarea
                    name="remarks"
                    rows="5"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100"
                    placeholder="Write follow-up notes..."></textarea>

            </div>

            {{-- Next Follow-up --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">

                    Next Follow-up

                </label>

                <input
                    type="date"
                    name="next_followup"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

            </div>

            {{-- Lead Status --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">

                    Lead Status

                </label>

                <select
                    name="lead_status"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    <option value="Assigned" {{ $lead->status=='Assigned' ? 'selected' : '' }}>Assigned</option>

                    <option value="Contacted" {{ $lead->status=='Contacted' ? 'selected' : '' }}>Contacted</option>

                    <option value="Follow-up" {{ $lead->status=='Follow-up' ? 'selected' : '' }}>Follow-up</option>

                    <option value="Interested" {{ $lead->status=='Interested' ? 'selected' : '' }}>Interested</option>

                    <option value="Not Interested" {{ $lead->status=='Not Interested' ? 'selected' : '' }}>Not Interested</option>

                    <option value="Converted" {{ $lead->status=='Converted' ? 'selected' : '' }}>Converted</option>

                </select>

            </div>

        </div>

        <div class="mt-8 flex justify-end gap-3">

            <button
                type="reset"
                class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                Reset

            </button>

            <button
                type="submit"
                class="rounded-xl bg-green-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-green-700">

                Save Follow-up

            </button>

        </div>

    </form>

</div>

@endif

</div>

@endsection