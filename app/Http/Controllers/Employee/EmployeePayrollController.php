<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Illuminate\Support\Facades\Auth;

class EmployeePayrollController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(403, 'This account is not linked to an employee profile.');
        }

        $payrolls = Payroll::where('employee_id', $employee->id)
            ->latest()
            ->paginate(10);

        return view('employee.payroll.index', compact('payrolls'));
    }

    public function show(Payroll $payroll)
    {
        if ($payroll->employee_id != Auth::user()->employee->id) {
            abort(403);
        }

        return view(
            'employee.payroll.show',
            compact('payroll')
        );
    }

    public function downloadPdf(Payroll $payroll)
    {
        if ($payroll->employee_id != Auth::user()->employee->id) {
            abort(403);
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
            'payrolls.pdf',
            compact('payroll')
        );

        return $pdf->download(
            'SalarySlip_' . $payroll->salary_month . '.pdf'
        );
    }


}