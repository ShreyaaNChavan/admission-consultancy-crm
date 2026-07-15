@extends('layouts.app')

@section('page-title', 'Student Profile')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

        <div>

            <h1 class="text-3xl font-bold text-gray-900">

                Student Profile

            </h1>

            <p class="mt-1 text-gray-500">

                View complete academic and financial information.

            </p>

        </div>

        <a href="{{ route('students.index') }}"
            class="rounded-xl border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition">

            Back

        </a>

    </div>


    {{-- Student Card --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

        <div class="flex flex-col gap-6 lg:flex-row lg:justify-between lg:items-center">

            <div class="flex items-center gap-5">

                <div
                    class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-100 text-3xl font-bold text-blue-600">

                    {{ strtoupper(substr($student->full_name, 0, 1)) }}

                </div>

                <div>

                    <h2 class="text-2xl font-bold text-gray-900">

                        {{ $student->full_name }}

                    </h2>

                    <p class="mt-1 text-gray-500">

                        {{ $student->student_code }}

                    </p>

                    <p class="text-gray-500">

                        {{ $student->course?->course_name }}

                    </p>

                </div>

            </div>

            <div>

                @php

                    $statusClass = match ($student->status) {

                        'Active' => 'bg-green-100 text-green-700',

                        'Completed' => 'bg-blue-100 text-blue-700',

                        'Dropped' => 'bg-red-100 text-red-700',

                        default => 'bg-gray-100 text-gray-700'

                    };

                @endphp

                <span class="inline-flex rounded-full px-4 py-2 text-sm font-semibold {{ $statusClass }}">

                    {{ $student->status }}

                </span>

            </div>

        </div>

        <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

            <div>

                <p class="text-sm text-gray-500">

                    Course

                </p>

                <p class="mt-1 font-semibold text-gray-900">

                    {{ $student->course?->course_name }}

                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">

                    Batch

                </p>

                <p class="mt-1 font-semibold text-gray-900">

                    {{ $student->batch?->batch_name ?? '-' }}

                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">

                    Admission Date

                </p>

                <p class="mt-1 font-semibold text-gray-900">

                    {{ $student->admission_date }}

                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">

                    Fee Status

                </p>

                @php

                    $feeStatus = $student->invoice?->status ?? 'Not Generated';

                    $feeClass = match ($feeStatus) {

                        'Paid' => 'bg-green-100 text-green-700',

                        'Pending' => 'bg-red-100 text-red-700',

                        'Partial' => 'bg-yellow-100 text-yellow-700',

                        default => 'bg-gray-100 text-gray-700'

                    };

                @endphp

                <span class="mt-2 inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $feeClass }}">

                    {{ $feeStatus }}

                </span>

            </div>

        </div>

    </div>
    {{-- Payment History --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <div class="mb-6">

            <h2 class="text-xl font-semibold text-gray-900">

                Payment History

            </h2>

            <p class="mt-1 text-sm text-gray-500">

                All fee payments made by the student.

            </p>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="border-b border-gray-200 bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Date

                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Amount

                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Payment Mode

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($student->invoice?->payments ?? [] as $payment)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4">

                                {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}

                            </td>

                            <td class="px-6 py-4 font-semibold text-green-600">

                                ₹{{ number_format($payment->amount, 2) }}

                            </td>

                            <td class="px-6 py-4">

                                <span
                                    class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                                    {{ $payment->payment_mode }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="px-6 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <h3 class="text-lg font-semibold text-gray-700">

                                        No Payments Found

                                    </h3>

                                    <p class="mt-2 text-sm text-gray-500">

                                        Payment history will appear here.

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
    @endsection