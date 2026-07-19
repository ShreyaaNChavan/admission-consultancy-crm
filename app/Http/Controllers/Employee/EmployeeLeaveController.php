<?php

namespace App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeLeaveController extends Controller
{
    public function index()
    {
        //$employee = auth()->user()->employee;

        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(403, 'This account is not linked to an employee profile.');
        }

        $leaveRequests = LeaveRequest::where(
            'employee_id',
            $employee->id
        )
            ->latest()
            ->paginate(10);
        $pending = LeaveRequest::where('employee_id', $employee->id)
            ->where('status', 'Pending')
            ->count();

        $approved = LeaveRequest::where('employee_id', $employee->id)
            ->where('status', 'Approved')
            ->count();

        $rejected = LeaveRequest::where('employee_id', $employee->id)
            ->where('status', 'Rejected')
            ->count();

        $totalDays = LeaveRequest::where('employee_id', $employee->id)
            ->where('status', 'Approved')
            ->sum('total_days');

        return view(
            'employee.leave.index',
            compact(
                'leaveRequests',
                'pending',
                'approved',
                'rejected',
                'totalDays'
            )
        );
    }

    public function create()
    {
        return view('employee.leave.create');
    }

    public function store(Request $request)
    {
        $employee = auth()->user()->employee;

        $validated = $request->validate([

            'leave_type' => 'required',

            'from_date' => 'required|date',

            'to_date' => 'required|date|after_or_equal:from_date',

            'reason' => 'required|string',

        ]);

        $validated['employee_id'] = $employee->id;

        $validated['total_days'] =
            Carbon::parse($validated['from_date'])
                ->diffInDays(
                    Carbon::parse($validated['to_date'])
                ) + 1;

        LeaveRequest::create($validated);

        return redirect()
            ->route('employee.leave.index')
            ->with('success', 'Leave request submitted successfully.');
    }

    public function destroy(LeaveRequest $leaveRequest)
    {
        $employee = auth()->user()->employee;

        if (
            $leaveRequest->employee_id != $employee->id ||
            $leaveRequest->status != 'Pending'
        ) {
            abort(403);
        }

        $leaveRequest->delete();

        return redirect()
            ->route('employee.leave.index')
            ->with('success', 'Leave request cancelled.');
    }
}