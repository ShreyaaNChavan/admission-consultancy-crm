<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Payment;

class ReceiptController extends Controller
{
    public function show(Payment $payment)
    {
        $payment->load([
            'invoice.student.course',
            'invoice.student.feeStructure'
        ]);

        return view('receipt.show', compact('payment'));
    }
}