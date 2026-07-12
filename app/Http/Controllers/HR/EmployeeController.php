<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with([
            'department',
            'designation'
        ])->latest()->get();

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::where('status',1)
            ->orderBy('department_name')
            ->get();

        $designations = Designation::where('status',1)
            ->orderBy('designation_name')
            ->get();

        return view(
            'employee.create',
            compact(
                'departments',
                'designations'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'full_name' => 'required',

            'department_id' => 'required',

            'designation_id' => 'required',

            'phone' => 'required',

            'email' => 'required|email|unique:employees',

            'joining_date' => 'required|date',

            'salary' => 'required|numeric',

        ]);

        Employee::create([

            'employee_code' => 'EMP'.time(),

            'full_name' => $request->full_name,

            'department_id' => $request->department_id,

            'designation_id' => $request->designation_id,

            'phone' => $request->phone,

            'email' => $request->email,

            'joining_date' => $request->joining_date,

            'salary' => $request->salary,

            'status' => 'Active',

        ]);

        return redirect()
            ->route('employees.index')
            ->with('success','Employee Added Successfully');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::where('status',1)->get();

        $designations = Designation::where('status',1)->get();

        return view(
            'employee.edit',
            compact(
                'employee',
                'departments',
                'designations'
            )
        );
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([

            'full_name' => 'required',

            'department_id' => 'required',

            'designation_id' => 'required',

            'phone' => 'required',

            'email' => 'required|email|unique:employees,email,'.$employee->id,

            'joining_date' => 'required',

            'salary' => 'required|numeric',

            'status' => 'required',

        ]);

        $employee->update($request->all());

        return redirect()
            ->route('employees.index')
            ->with('success','Employee Updated Successfully');
    }
}