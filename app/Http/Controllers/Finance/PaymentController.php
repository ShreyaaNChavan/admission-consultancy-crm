<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(Invoice $invoice)
    {
        $payments = $invoice->payments()->latest()->get();

        $paidAmount = $payments->sum('amount');

        $remainingAmount = $invoice->total_amount - $paidAmount;

        return view(
            'payment.index',
            compact(
                'invoice',
                'payments',
                'paidAmount',
                'remainingAmount'
            )
        );
    }

    public function store(Request $request, Invoice $invoice)
    {
        $request->validate([

            'payment_date' => 'required|date',

            'amount' => 'required|numeric|min:1',

            'payment_mode' => 'required',

        ]);

        $paidAmount = $invoice->payments()->sum('amount');

        $remainingAmount = $invoice->total_amount - $paidAmount;

        if ($request->amount > $remainingAmount) {

            return back()->withErrors([

                'amount' => 'Payment amount cannot exceed remaining balance.'

            ]);

        }

        Payment::create([

            'receipt_no' => 'RCP' . time(),

            'invoice_id' => $invoice->id,

            'payment_date' => $request->payment_date,

            'amount' => $request->amount,

            'payment_mode' => $request->payment_mode,

            'transaction_no' => $request->transaction_no,

            'remarks' => $request->remarks,

        ]);

        $paidAmount += $request->amount;

        if ($paidAmount >= $invoice->total_amount) {

            $invoice->update([

                'status' => 'Paid'

            ]);

        } else {

            $invoice->update([

                'status' => 'Partially Paid'

            ]);

        }

        return redirect()
            ->route('payments.index', $invoice)
            ->with('success', 'Payment Added Successfully');
    }
}