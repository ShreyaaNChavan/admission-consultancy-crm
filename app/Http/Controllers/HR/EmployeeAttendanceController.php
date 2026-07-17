<?php

namespace App\Http\Controllers\HR;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = EmployeeAttendance::with('employee');

        // Search Employee
        if ($request->filled('search')) {

            $query->whereHas('employee', function ($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->search . '%');

            });

        }

        // Filter Status
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        // Filter Date
        if ($request->filled('attendance_date')) {

            $query->whereDate('attendance_date', $request->attendance_date);

        }

        $attendances = $query
            ->latest('attendance_date')
            ->paginate(10)
            ->withQueryString();

        $presentCount = EmployeeAttendance::whereDate('attendance_date', today())
            ->where('status', 'Present')
            ->count();

        $absentCount = EmployeeAttendance::whereDate('attendance_date', today())
            ->where('status', 'Absent')
            ->count();

        $lateCount = EmployeeAttendance::whereDate('attendance_date', today())
            ->where('status', 'Late')
            ->count();

        $leaveCount = EmployeeAttendance::whereDate('attendance_date', today())
            ->where('status', 'Leave')
            ->count();

        return view(
            'hr.employee-attendances.index',
            compact(
                'attendances',
                'presentCount',
                'absentCount',
                'lateCount',
                'leaveCount'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $employees = Employee::orderBy('first_name')->get();
        $employees = Employee::orderBy('full_name')->get();
        return view('hr.employee-attendances.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'attendance_date' => 'required|date',
            'check_in' => 'nullable',
            'check_out' => 'nullable',
            'status' => 'required|in:Present,Absent,Late,Half Day,Leave',
            'remarks' => 'nullable|string|max:500',
        ]);

        $exists = EmployeeAttendance::where('employee_id', $validated['employee_id'])
            ->where('attendance_date', $validated['attendance_date'])
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'attendance_date' => 'Attendance for this employee on this date already exists.',
                ]);
        }

        EmployeeAttendance::create($validated);

        return redirect()
            ->route('employee-attendances.index')
            ->with('success', 'Attendance marked successfully.');
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(EmployeeAttendance $employeeAttendance)
    {
        $employees = Employee::orderBy('full_name')->get();

        return view('hr.employee-attendances.edit', compact('employeeAttendance', 'employees'));
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request, EmployeeAttendance $employeeAttendance)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'attendance_date' => 'required|date',
            'check_in' => 'nullable',
            'check_out' => 'nullable',
            'status' => 'required|in:Present,Absent,Late,Half Day,Leave',
            'remarks' => 'nullable|string|max:500',
        ]);

        $exists = EmployeeAttendance::where('employee_id', $validated['employee_id'])
            ->where('attendance_date', $validated['attendance_date'])
            ->where('id', '!=', $employeeAttendance->id)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'attendance_date' => 'Attendance for this employee on this date already exists.',
                ]);
        }

        $employeeAttendance->update($validated);

        return redirect()
            ->route('employee-attendances.index')
            ->with('success', 'Attendance updated successfully.');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(EmployeeAttendance $employeeAttendance)
    {
        $employeeAttendance->delete();

        return redirect()
            ->route('employee-attendances.index')
            ->with('success', 'Attendance deleted successfully.');
    }
}