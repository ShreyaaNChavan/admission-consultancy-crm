@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6">

    Invoice Payment

</h2>

@if(session('success'))

    <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">

        {{ session('success') }}

    </div>

@endif

@if($errors->any())

    <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">

        {{ $errors->first() }}

    </div>

@endif

{{-- Invoice Summary --}}
<div class="bg-white shadow rounded p-6 mb-6">

    <div class="grid grid-cols-2 gap-5">

        <div>
            <strong>Invoice :</strong>
            {{ $invoice->invoice_no }}
        </div>

        <div>
            <strong>Status :</strong>
            {{ $invoice->status }}
        </div>

        <div>
            <strong>Total :</strong>
            ₹{{ number_format($invoice->total_amount,2) }}
        </div>

        <div>
            <strong>Paid :</strong>
            ₹{{ number_format($paidAmount,2) }}
        </div>

        <div>
            <strong>Remaining :</strong>
            ₹{{ number_format($remainingAmount,2) }}
        </div>

    </div>

</div>

{{-- Add Payment --}}
<div class="bg-white shadow rounded p-6 mb-6">

    <h3 class="text-xl font-bold mb-4">

        Add Payment

    </h3>

    <form action="{{ route('payments.store',$invoice) }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-5">

            <div>

                <label>Payment Date</label>

                <input
                    type="date"
                    name="payment_date"
                    class="border w-full p-2 rounded"
                    required>

            </div>

            <div>

                <label>Amount</label>

                <input
                    type="number"
                    name="amount"
                    class="border w-full p-2 rounded"
                    required>

            </div>

            <div>

                <label>Payment Mode</label>

                <select
                    name="payment_mode"
                    class="border w-full p-2 rounded">

                    <option>Cash</option>
                    <option>UPI</option>
                    <option>Card</option>
                    <option>Bank Transfer</option>
                    <option>Cheque</option>

                </select>

            </div>

            <div>

                <label>Transaction No</label>

                <input
                    type="text"
                    name="transaction_no"
                    class="border w-full p-2 rounded">

            </div>

            <div class="col-span-2">

                <label>Remarks</label>

                <textarea
                    name="remarks"
                    rows="3"
                    class="border w-full p-2 rounded"></textarea>

            </div>

        </div>

        <button
            class="mt-5 bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">

            Save Payment

        </button>

    </form>

</div>

{{-- Payment History --}}
<div class="bg-white shadow rounded overflow-hidden">

    <h3 class="text-xl font-bold p-5">

        Payment History

    </h3>

    <table class="w-full">

        <thead class="bg-gray-200">

            <tr>

                <th class="p-3 text-left">Receipt</th>

                <th class="p-3 text-left">Date</th>

                <th class="p-3 text-left">Amount</th>

                <th class="p-3 text-left">Mode</th>

                <th class="p-3 text-left">Transaction</th>

            </tr>

        </thead>

        <tbody>

            @forelse($payments as $payment)

                <tr class="border-b">

                    <td class="p-3">

                        <a
                            href="{{ route('receipt.show',$payment) }}"
                            class="text-blue-600 hover:underline">

                            {{ $payment->receipt_no }}

                        </a>

                    </td>

                    <td class="p-3">

                        {{ $payment->payment_date }}

                    </td>

                    <td class="p-3">

                        ₹{{ number_format($payment->amount,2) }}

                    </td>

                    <td class="p-3">

                        {{ $payment->payment_mode }}

                    </td>

                    <td class="p-3">

                        {{ $payment->transaction_no ?? '-' }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center p-5 text-gray-500">

                        No Payments Yet

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection