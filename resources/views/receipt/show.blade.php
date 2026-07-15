@extends('layouts.app')

@section('page-title', 'Payment Receipt')
@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-2xl font-bold text-gray-900">

                    Payment Receipt

                </h1>

                <p class="mt-1 text-sm text-gray-500">

                    Official payment acknowledgement.

                </p>

            </div>

            <button onclick="window.print()"
                class="inline-flex items-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700 print:hidden">

                Print Receipt

            </button>

        </div>


        {{-- Receipt Card --}}
        <div class="rounded-lg border border-gray-200 bg-white shadow-sm">

            {{-- Top Header --}}
            <div class="flex items-center justify-between border-b border-gray-200 px-8 py-6">

                <div>

                    <h2 class="text-xl font-semibold text-gray-900">

                        EdTech CRM ERP

                    </h2>

                    <p class="mt-1 text-sm text-gray-500">

                        Fee Payment Receipt

                    </p>

                </div>

                <div class="text-right">

                    <p class="text-sm font-medium text-gray-500">

                        Receipt Number

                    </p>

                    <h3 class="mt-1 text-lg font-semibold text-blue-600">

                        {{ $payment->receipt_no }}

                    </h3>

                </div>

            </div>



            {{-- Student + Invoice --}}
            <div class="grid gap-8 border-b border-gray-200 px-8 py-6 lg:grid-cols-2">

                {{-- Student --}}
                <div>

                    <h3 class="mb-5 text-lg font-semibold text-gray-900">

                        Student Information

                    </h3>

                    <div class="space-y-4">

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Student Name

                            </p>

                            <p class="mt-1 text-base font-semibold text-gray-900">

                                {{ $payment->invoice->student->full_name }}

                            </p>

                        </div>

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Course

                            </p>

                            <p class="mt-1 text-base font-semibold text-gray-900">

                                {{ $payment->invoice->student->course->course_name }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- Invoice --}}
                <div>

                    <h3 class="mb-5 text-lg font-semibold text-gray-900">

                        Invoice Information

                    </h3>

                    <div class="space-y-4">

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Invoice Number

                            </p>

                            <p class="mt-1 text-base font-semibold text-gray-900">

                                {{ $payment->invoice->invoice_no }}

                            </p>

                        </div>

                        <div>

                            <p class="text-sm font-medium text-gray-500">

                                Payment Date

                            </p>

                            <p class="mt-1 text-base font-semibold text-gray-900">

                                {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Payment Summary --}}
            <div class="px-8 py-6">

                <h3 class="mb-5 text-lg font-semibold text-gray-900">

                    Payment Details

                </h3>

                <div class="overflow-hidden rounded-lg border border-gray-200">

                    <table class="min-w-full">

                        <tbody class="divide-y divide-gray-200">

                            <tr>

                                <td class="w-1/3 bg-gray-50 px-6 py-4 text-sm font-medium text-gray-500">

                                    Amount Paid

                                </td>

                                <td class="px-6 py-4">

                                    <span class="text-2xl font-bold text-green-600">

                                        ₹{{ number_format($payment->amount, 2) }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <td class="bg-gray-50 px-6 py-4 text-sm font-medium text-gray-500">

                                    Payment Mode

                                </td>

                                <td class="px-6 py-4">

                                    @php

                                        $badge = match ($payment->payment_mode) {

                                            'Cash' => 'bg-green-100 text-green-700',

                                            'UPI' => 'bg-purple-100 text-purple-700',

                                            'Card' => 'bg-blue-100 text-blue-700',

                                            'Bank Transfer' => 'bg-cyan-100 text-cyan-700',

                                            'Cheque' => 'bg-orange-100 text-orange-700',

                                            default => 'bg-gray-100 text-gray-700'

                                        };

                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $badge }}">

                                        {{ $payment->payment_mode }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <td class="bg-gray-50 px-6 py-4 text-sm font-medium text-gray-500">

                                    Transaction Number

                                </td>

                                <td class="px-6 py-4 text-sm font-medium text-gray-800">

                                    {{ $payment->transaction_no ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <td class="bg-gray-50 px-6 py-4 text-sm font-medium text-gray-500">

                                    Remarks

                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">

                                    {{ $payment->remarks ?: '-' }}

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- Footer --}}
            <div class="border-t border-gray-200 bg-gray-50 px-8 py-6">

                <div class="space-y-6">

                    <p class="text-sm leading-7 text-gray-700">

                        Received with thanks from

                        <span class="font-semibold text-gray-900">

                            {{ $payment->invoice->student->full_name }}

                        </span>

                        towards payment of the course fees for

                        <span class="font-semibold text-gray-900">

                            {{ $payment->invoice->student->course->course_name }}

                        </span>.

                    </p>

                    <div class="flex justify-between pt-8">

                        <div>

                            <p class="text-sm text-gray-500">

                                Generated On

                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-800">

                                {{ now()->format('d M Y h:i A') }}

                            </p>

                        </div>

                        <div class="text-center">

                            <div class="mb-12 w-52 border-b border-gray-400"></div>

                            <p class="text-sm font-semibold text-gray-800">

                                Authorized Signature

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection