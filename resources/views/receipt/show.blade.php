@extends('layouts.app')

@section('content')

    <div class="bg-white shadow rounded p-8">

        <div class="flex justify-between items-center mb-8">

            <h2 class="text-3xl font-bold">

                Payment Receipt

            </h2>

            <button onclick="window.print()" class="bg-blue-600 text-white px-5 py-2 rounded">

                Print Receipt

            </button>

        </div>

        <hr class="mb-6">

        <p><strong>Receipt No :</strong> {{ $payment->receipt_no }}</p>

        <p><strong>Invoice No :</strong> {{ $payment->invoice->invoice_no }}</p>

        <p><strong>Student :</strong> {{ $payment->invoice->student->full_name }}</p>

        <p><strong>Course :</strong> {{ $payment->invoice->student->course->course_name }}</p>

        <p><strong>Payment Date :</strong> {{ $payment->payment_date }}</p>

        <p><strong>Amount :</strong>
            ₹{{ number_format($payment->amount, 2) }}
        </p>

        <p><strong>Payment Mode :</strong>
            {{ $payment->payment_mode }}
        </p>

        <p><strong>Transaction No :</strong>
            {{ $payment->transaction_no ?? '-' }}
        </p>

        <p><strong>Remarks :</strong>
            {{ $payment->remarks ?? '-' }}
        </p>

        <hr class="my-6">

        <p>

            Received with thanks from

            <strong>

                {{ $payment->invoice->student->full_name }}

            </strong>

            towards course fee payment.

        </p>

    </div>

@endsection