@extends('layouts.app')

@section('content')
@section('page-title', 'Invoice Payment')

@section('content')

    <div class="space-y-6">

        {{-- Alerts --}}
        @if(session('success'))

            <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">

                {{ session('success') }}

            </div>

        @endif

        @if($errors->any())

            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">

                {{ $errors->first() }}

            </div>

        @endif

        @php
            $role = Auth::user()->role->role_name;
        @endphp

        @if($role == 'Accountant')

            {{-- Record New Payment Form --}}
            {{-- Add Payment --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

            <div class="mb-6">

                <h2 class="text-xl font-semibold text-gray-900">

                    Record New Payment

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Enter payment details received from the student.

                </p>
                <form action="{{ route('payments.store', $invoice) }}" method="POST">

                @csrf

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                    {{-- Date --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Payment Date

                        </label>

                        <input type="date" name="payment_date" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    </div>

                    {{-- Amount --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Amount

                        </label>

                        <input type="number" name="amount" required placeholder="Enter Amount"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    </div>

                    {{-- Payment Mode --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Payment Mode

                        </label>

                        <select name="payment_mode"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                            <option>Cash</option>
                            <option>UPI</option>
                            <option>Card</option>
                            <option>Bank Transfer</option>
                            <option>Cheque</option>

                        </select>

                    </div>

                    {{-- Transaction --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Transaction Number

                        </label>

                        <input type="text" name="transaction_no" placeholder="Optional"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    </div>

                    {{-- Remarks --}}
                    <div class="lg:col-span-2">

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Remarks

                        </label>

                        <textarea rows="4" name="remarks" placeholder="Additional payment notes..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100"></textarea>

                    </div>

                </div>

                <div class="mt-8 flex justify-end gap-3">

                    <button type="reset"
                        class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                        Reset

                    </button>

                    <button type="submit"
                        class="rounded-xl bg-green-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-green-700">

                        Save Payment

                    </button>

                </div>

            </form>


            </div>



        </div>
        @endif

        {{-- Header --}}
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <h1 class="text-3xl font-bold text-gray-900">

                    Invoice Payment

                </h1>

                <p class="mt-1 text-gray-500">

                    Manage invoice payments and transaction history.

                </p>

            </div>

            <a href="{{ url()->previous() }}"
                class="rounded-xl border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                Back

            </a>

        </div>


        {{-- Invoice Summary --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <div class="mb-6">

                <h2 class="text-xl font-semibold text-gray-900">

                    Invoice Summary

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Current invoice overview.

                </p>

            </div>

            <div class="grid grid-cols-2 gap-6 lg:grid-cols-5">

                <div>

                    <p class="text-sm text-gray-500">

                        Invoice No

                    </p>

                    <p class="mt-2 font-semibold text-gray-900">

                        {{ $invoice->invoice_no }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Total Amount

                    </p>

                    <p class="mt-2 text-xl font-bold text-gray-900">

                        ₹{{ number_format($invoice->total_amount, 2) }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Paid

                    </p>

                    <p class="mt-2 text-xl font-bold text-green-600">

                        ₹{{ number_format($paidAmount, 2) }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Remaining

                    </p>

                    <p class="mt-2 text-xl font-bold text-red-600">

                        ₹{{ number_format($remainingAmount, 2) }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Status

                    </p>

                    @php

                        $statusClass = match ($invoice->status) {

                            'Paid' => 'bg-green-100 text-green-700',

                            'Partial' => 'bg-yellow-100 text-yellow-700',

                            'Pending' => 'bg-red-100 text-red-700',

                            default => 'bg-gray-100 text-gray-700'

                        };

                    @endphp

                    <span class="mt-2 inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">

                        {{ $invoice->status }}

                    </span>

                </div>

            </div>

        </div>



        
        {{-- Payment History --}}
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-gray-200 p-6">

                <div>

                    <h2 class="text-xl font-semibold text-gray-900">

                        Payment History

                    </h2>

                    <p class="mt-1 text-sm text-gray-500">

                        Complete transaction history for this invoice.

                    </p>

                </div>

                <div>

                    <span class="rounded-xl bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700">

                        {{ $payments->count() }} Payments

                    </span>

                </div>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Receipt

                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Date

                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Amount

                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Payment Mode

                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Transaction

                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">

                                Action

                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($payments as $payment)

                            <tr class="transition hover:bg-gray-50">

                                {{-- Receipt --}}
                                <td class="px-6 py-5">

                                    <div>

                                        <p class="font-semibold text-gray-900">

                                            {{ $payment->receipt_no }}

                                        </p>

                                    </div>

                                </td>

                                {{-- Date --}}
                                <td class="px-6 py-5 text-gray-700">

                                    {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}

                                </td>

                                {{-- Amount --}}
                                <td class="px-6 py-5">

                                    <span class="text-lg font-bold text-green-600">

                                        ₹{{ number_format($payment->amount, 2) }}

                                    </span>

                                </td>

                                {{-- Mode --}}
                                <td class="px-6 py-5">

                                    @php

                                        $modeClass = match ($payment->payment_mode) {

                                            'Cash' => 'bg-green-100 text-green-700',

                                            'UPI' => 'bg-purple-100 text-purple-700',

                                            'Card' => 'bg-blue-100 text-blue-700',

                                            'Bank Transfer' => 'bg-cyan-100 text-cyan-700',

                                            'Cheque' => 'bg-orange-100 text-orange-700',

                                            default => 'bg-gray-100 text-gray-700'

                                        };

                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $modeClass }}">

                                        {{ $payment->payment_mode }}

                                    </span>

                                </td>

                                {{-- Transaction --}}
                                <td class="px-6 py-5">

                                    @if($payment->transaction_no)

                                        <span class="rounded-lg bg-gray-100 px-3 py-2 text-sm text-gray-700">

                                            {{ $payment->transaction_no }}

                                        </span>

                                    @else

                                        <span class="text-gray-400">

                                            —

                                        </span>

                                    @endif

                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-5 text-center">

                                    <a href="{{ route('receipt.show', $payment) }}"
                                        class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">

                                        Receipt

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="px-6 py-16">

                                    <div class="flex flex-col items-center text-center">

                                        <svg class="mb-4 h-14 w-14 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />

                                        </svg>

                                        <h3 class="text-lg font-semibold text-gray-700">

                                            No Payments Recorded

                                        </h3>

                                        <p class="mt-2 text-sm text-gray-500">

                                            Payment records will appear here after transactions are added.

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