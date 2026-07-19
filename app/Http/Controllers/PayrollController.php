<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PayrollController extends Controller
{
    /**
     * Payroll List
     */
    public function index(Request $request)
    {
        $query = Payroll::with('employee');

        if ($request->filled('search')) {

            $query->whereHas('employee', function ($q) use ($request) {

                $q->where('full_name', 'like', '%' . $request->search . '%');

            });

        }

        if ($request->filled('month')) {

            $query->where('payroll_month', $request->month);

        }

        if ($request->filled('year')) {

            $query->where('payroll_year', $request->year);

        }

        $payrolls = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('payroll.index', compact('payrolls'));
    }

    /**
     * Create Payroll
     */
    public function create()
    {
        $employees = Employee::where('status', 'Active')
            ->orderBy('full_name')
            ->get();

        return view('payroll.create', compact('employees'));
    }

    public function show(Payroll $payroll)
    {
        $payroll->load('employee');

        return view('payroll.show', compact('payroll'));
    }

    public function edit(Payroll $payroll)
    {
        $employees = Employee::where('status', 'Active')->get();

        return view('payroll.edit', compact(
            'payroll',
            'employees'
        ));
    }

    public function update(Request $request, Payroll $payroll)
    {
        $request->validate([

            'allowances' => 'required|numeric',

            'deductions' => 'required|numeric',

            'overtime' => 'required|numeric',

            'payment_date' => 'required|date',

            'status' => 'required',

        ]);

        $netSalary =
            $payroll->basic_salary
            + $request->allowances
            + $request->overtime
            - $request->deductions;

        $payroll->update([

            'allowances' => $request->allowances,

            'deductions' => $request->deductions,

            'overtime' => $request->overtime,

            'net_salary' => $netSalary,

            'payment_date' => $request->payment_date,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('payrolls.index')
            ->with('success', 'Payroll Updated Successfully');
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();

        return redirect()
            ->route('payrolls.index')
            ->with('success', 'Payroll Deleted Successfully');
    }

    /**
     * Store Payroll
     */
    public function store(Request $request)
    {
        $request->validate([

            'employee_id' => 'required|exists:employees,id',
            'payroll_month' => 'required',
            'payroll_year' => 'required',
            'allowances' => 'required|numeric|min:0',
            'deductions' => 'required|numeric|min:0',
            'overtime' => 'required|numeric|min:0',
            'payment_date' => 'required|date',

        ]);

        $employee = Employee::findOrFail($request->employee_id);

        // Prevent duplicate payroll
        $exists = Payroll::where('employee_id', $employee->id)
            ->where('payroll_month', $request->payroll_month)
            ->where('payroll_year', $request->payroll_year)
            ->exists();

        if ($exists) {

            return back()
                ->withInput()
                ->with('error', 'Payroll already generated for this month.');

        }

        $basicSalary = $employee->salary;

        $netSalary = $basicSalary
            + $request->allowances
            + $request->overtime
            - $request->deductions;

        Payroll::create([

            'employee_id' => $employee->id,

            'payroll_month' => $request->payroll_month,

            'payroll_year' => $request->payroll_year,

            'basic_salary' => $basicSalary,

            'allowances' => $request->allowances,

            'deductions' => $request->deductions,

            'overtime' => $request->overtime,

            'net_salary' => $netSalary,

            'payment_date' => $request->payment_date,

            'status' => 'Paid',

        ]);

        return redirect()
            ->route('payrolls.index')
            ->with('success', 'Payroll Generated Successfully');
    }

    public function downloadPdf(Payroll $payroll)
    {
        $payroll->load(['employee.designation']);

        $pdf = Pdf::loadView('payroll.pdf', compact('payroll'));

        return $pdf->download(
            'SalarySlip_' . $payroll->employee->full_name . '_'
            . $payroll->payroll_month . '_' . $payroll->payroll_year . '.pdf'
        );
    }
}