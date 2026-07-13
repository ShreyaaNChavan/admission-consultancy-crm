@extends('layouts.app')

@section('content')

    <h2 class="text-3xl font-bold mb-6">

        Student Profile

    </h2>

    <div class="bg-white shadow rounded p-6">

        <div class="grid grid-cols-2 gap-6">

            <div>

                <strong>Student Code</strong>

                <p>{{ $student->student_code }}</p>

            </div>

            <div>

                <strong>Name</strong>

                <p>{{ $student->full_name }}</p>

            </div>

            <div>

                <strong>Course</strong>

                <p>{{ $student->course?->course_name }}</p>

            </div>

            <div>

                <strong>Batch</strong>

                <p>{{ $student->batch?->batch_name ?? '-' }}</p>

            </div>

            <div>

                <strong>Admission Date</strong>

                <p>{{ $student->admission_date }}</p>

            </div>

            <div>

                <strong>Status</strong>

                <p>{{ $student->status }}</p>

            </div>

        </div>

    </div>

    {{-- Invoice --}}

    <div class="bg-white shadow rounded p-6 mt-6">

        <h3 class="text-xl font-bold mb-4">

            Invoice

        </h3>

        @if($student->invoice)

            <p>

                <strong>Invoice No :</strong>

                {{ $student->invoice->invoice_no }}

            </p>

            <p>

                <strong>Total Amount :</strong>

                ₹{{ number_format($student->invoice->total_amount, 2) }}

            </p>

            <p>

                <strong>Status :</strong>

                {{ $student->invoice->status }}

            </p>

        @else

            <p>No Invoice Found.</p>

        @endif

    </div>

    {{-- Payments --}}

    <div class="bg-white shadow rounded p-6 mt-6">

        <h3 class="text-xl font-bold mb-4">

            Payment History

        </h3>

        <table class="w-full">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3 text-left">Date</th>

                    <th class="p-3 text-left">Amount</th>

                    <th class="p-3 text-left">Mode</th>

                </tr>

            </thead>

            <tbody>

                @forelse($student->invoice?->payments ?? [] as $payment)

                    <tr class="border-b">

                        <td class="p-3">

                            {{ $payment->payment_date }}

                        </td>

                        <td class="p-3">

                            ₹{{ number_format($payment->amount, 2) }}

                        </td>

                        <td class="p-3">

                            {{ $payment->payment_mode }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3" class="text-center p-4">

                            No Payments Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Attendance --}}

    <div class="bg-white shadow rounded p-6 mt-6">

        <h3 class="text-xl font-bold mb-4">

            Attendance History

        </h3>

        <table class="w-full">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3 text-left">Date</th>

                    <th class="p-3 text-left">Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($student->attendances as $attendance)

                    <tr class="border-b">

                        <td class="p-3">

                            {{ $attendance->attendance_date }}

                        </td>

                        <td class="p-3">

                            {{ $attendance->status }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="2" class="text-center p-4">

                            No Attendance Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection