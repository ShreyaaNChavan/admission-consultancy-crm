<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Role;
use App\Models\Faculty;

class EmployeeController extends Controller
{
    /**
     * Display Employee List
     */
    public function index(Request $request)
    {
        $query = Employee::with([
            'department',
            'designation',
            'role'
        ]);

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('employee_code', 'like', "%{$search}%")
                    ->orWhere('full_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");

            });

        }

        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $employees = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('employee.index', compact('employees'));
    }

    /**
     * Show Create Form
     */
    public function create()
    {
        $departments = Department::where('status', 1)
            ->orderBy('department_name')
            ->get();

        $designations = Designation::where('status', 1)
            ->orderBy('designation_name')
            ->get();

        $roles = Role::orderBy('role_name')->get();

        return view(
            'employee.create',
            compact(
                'departments',
                'designations',
                'roles'
            )
        );
    }

    /**
     * Store Employee
     */
    public function store(Request $request)
    {
        $request->validate([

            'full_name' => 'required',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'role_id' => 'required|exists:roles,id',
            'phone' => 'required',
            'email' => 'required|email|unique:employees,email',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric',

        ]);

        $employee = Employee::create([

            'employee_code' => 'EMP' . time(),

            'full_name' => $request->full_name,

            'department_id' => $request->department_id,

            'designation_id' => $request->designation_id,

            'role_id' => $request->role_id,

            'phone' => $request->phone,

            'email' => $request->email,

            'joining_date' => $request->joining_date,

            'salary' => $request->salary,

            'status' => 'Active',

        ]);

        $designation = Designation::findOrFail($request->designation_id);

        if (trim($designation->designation_name) === 'Faculty') {

            Faculty::create([

                'faculty_code' => 'FAC' . time(),

                'full_name' => $employee->full_name,

                'qualification' => '-',

                'specialization' => 'Faculty',

                'phone' => $employee->phone,

                'email' => $employee->email,

                'status' => 'Active',

            ]);

        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee Added Successfully');
    }
    /**
     * Show Edit Form
     */
    public function edit(Employee $employee)
    {
        $departments = Department::where('status', 1)
            ->orderBy('department_name')
            ->get();

        $designations = Designation::where('status', 1)
            ->orderBy('designation_name')
            ->get();

        $roles = Role::orderBy('role_name')->get();

        return view(
            'employee.edit',
            compact(
                'employee',
                'departments',
                'designations',
                'roles'
            )
        );
    }

    /**
     * Update Employee
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([

            'full_name' => 'required',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'role_id' => 'required|exists:roles,id',
            'phone' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'joining_date' => 'required|date',
            'salary' => 'required|numeric',
            'status' => 'required',

        ]);

        $employee->update([

            'full_name' => $request->full_name,

            'department_id' => $request->department_id,

            'designation_id' => $request->designation_id,

            'role_id' => $request->role_id,

            'phone' => $request->phone,

            'email' => $request->email,

            'joining_date' => $request->joining_date,

            'salary' => $request->salary,

            'status' => $request->status,

        ]);

        $designation = Designation::findOrFail($request->designation_id);

        if (trim($designation->designation_name) === 'Faculty') {

            $faculty = Faculty::where('email', $employee->email)->first();

            if ($faculty) {

                $faculty->update([

                    'full_name' => $employee->full_name,

                    'qualification' => $faculty->qualification,

                    'specialization' => 'Faculty',

                    'phone' => $employee->phone,

                    'email' => $employee->email,

                    'status' => $employee->status,

                ]);

            } else {

                Faculty::create([

                    'faculty_code' => 'FAC' . time(),

                    'full_name' => $employee->full_name,

                    'qualification' => '-',

                    'specialization' => 'Faculty',

                    'phone' => $employee->phone,

                    'email' => $employee->email,

                    'status' => $employee->status,

                ]);

            }

        } else {

            Faculty::where('email', $employee->email)->delete();

        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee Updated Successfully');
    }

    /**
     * Delete Employee
     */
    public function destroy(Employee $employee)
    {
        Faculty::where('email', $employee->email)->delete();

        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee Deleted Successfully');
    }
}