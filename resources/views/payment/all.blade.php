@extends('layouts.app')

@section('page-title','Payments')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                Payments
            </h2>

            <p class="text-gray-500 mt-1">
                View all student payments.
            </p>

        </div>

    </div>

    <div class="bg-white rounded-2xl shadow border border-gray-200 p-6 mb-6">

        <form method="GET">

            <div class="flex gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search Receipt No or Student..."
                    class="flex-1 rounded-lg border-gray-300">

                <button
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">

                    Search

                </button>

            </div>

        </form>

    </div>

    <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-6 py-3 text-left">Receipt No</th>

                    <th class="px-6 py-3 text-left">Invoice</th>

                    <th class="px-6 py-3 text-left">Student</th>

                    <th class="px-6 py-3 text-left">Date</th>

                    <th class="px-6 py-3 text-right">Amount</th>

                    <th class="px-6 py-3 text-left">Mode</th>

                    <th class="px-6 py-3 text-center">Receipt</th>

                </tr>

            </thead>

            <tbody>

            @forelse($payments as $payment)

                <tr class="border-t hover:bg-gray-50">

                    <td class="px-6 py-4">

                        {{ $payment->receipt_no }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $payment->invoice->invoice_no }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $payment->invoice->student->full_name }}

                    </td>

                    <td class="px-6 py-4">

                        {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}

                    </td>

                    <td class="px-6 py-4 text-right font-semibold">

                        ₹{{ number_format($payment->amount,2) }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $payment->payment_mode }}

                    </td>

                    <td class="px-6 py-4 text-center">

                        <a
                            href="{{ route('receipt.show',$payment) }}"
                            class="px-3 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700">

                            View

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center py-8 text-gray-500">

                        No Payments Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-5">

        {{ $payments->links() }}

    </div>

</div>

@endsection