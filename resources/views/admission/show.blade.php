@extends('layouts.app')

@section('page-title','Admission Details')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

        <div>

            <h1 class="text-3xl font-bold text-gray-900">
                Admission Details
            </h1>

            <p class="mt-1 text-gray-500">
                View student admission information.
            </p>

        </div>

        <div class="flex flex-wrap gap-3">

            <a href="{{ route('admissions.edit',$student) }}"
                class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">

                Edit Admission

            </a>

            @if($student->invoice)

                <a href="{{ route('payments.index',$student->invoice) }}"
                    class="rounded-xl border border-green-600 px-5 py-3 text-sm font-semibold text-green-600 transition hover:bg-green-50">

                    Fee Payments

                </a>

            @endif

        </div>

    </div>

    {{-- Student Profile --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6">

        <div class="flex items-center gap-5">

            <div
                class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-100 text-3xl font-bold text-blue-600">

                {{ strtoupper(substr($student->full_name,0,1)) }}

            </div>

            <div>

                <h2 class="text-2xl font-semibold text-gray-900">

                    {{ $student->full_name }}

                </h2>

                <p class="mt-1 text-gray-500">

                    {{ $student->student_code }}

                </p>

                <span
                    class="mt-3 inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                    {{ $student->status }}

                </span>

            </div>

        </div>

    </div>

    {{-- Details --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

        {{-- Personal Information --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6">

            <h3 class="mb-5 text-lg font-semibold text-gray-900">

                Personal Information

            </h3>

            <div class="space-y-4">

                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Phone
                    </span>

                    <span class="font-medium">
                        {{ $student->phone }}
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Email
                    </span>

                    <span class="font-medium">
                        {{ $student->email }}
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Admission Date
                    </span>

                    <span class="font-medium">
                        {{ $student->admission_date }}
                    </span>

                </div>

            </div>

        </div>

        {{-- Academic Information --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6">

            <h3 class="mb-5 text-lg font-semibold text-gray-900">

                Academic Information

            </h3>

            <div class="space-y-4">

                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Course
                    </span>

                    <span class="font-medium">

                        {{ $student->course?->course_name ?? '-' }}

                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Status
                    </span>

                    <span class="font-medium">

                        {{ $student->status }}

                    </span>

                </div>

                @if($student->invoice)

                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Total Fees
                    </span>

                    <span class="font-semibold text-green-600">

                        ₹ {{ number_format($student->invoice->total_amount) }}

                    </span>

                </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection