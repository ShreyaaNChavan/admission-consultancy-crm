<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = LeaveRequest::with('employee');

        if ($request->filled('search')) {

            $query->whereHas('employee', function ($q) use ($request) {

                $q->where('full_name', 'like', '%' . $request->search . '%');

            });

        }

        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $leaveRequests = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $pendingCount = LeaveRequest::where('status', 'Pending')->count();

        $approvedCount = LeaveRequest::where('status', 'Approved')->count();

        $rejectedCount = LeaveRequest::where('status', 'Rejected')->count();

        return view(
            'hr.leave-requests.index',
            compact(
                'leaveRequests',
                'pendingCount',
                'approvedCount',
                'rejectedCount'
            )
        );
    }

    public function create()
    {
        $employees = Employee::orderBy('full_name')->get();

        return view('hr.leave-requests.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date|afterOrEqual:from_date',
            'reason' => 'required|string',
        ]);

        $validated['total_days'] =
            \Carbon\Carbon::parse($validated['from_date'])
                ->diffInDays(
                    \Carbon\Carbon::parse($validated['to_date'])
                ) + 1;

        LeaveRequest::create($validated);

        return redirect()
            ->route('leave-requests.index')
            ->with('success', 'Leave request created successfully.');
    }

    public function edit(LeaveRequest $leaveRequest)
    {
        $employees = Employee::orderBy('full_name')->get();

        return view(
            'hr.leave-requests.edit',
            compact('leaveRequest', 'employees')
        );
    }

    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date|afterOrEqual:from_date',
            'reason' => 'required|string',
            'status' => 'required',
            'admin_remark' => 'nullable|string',
        ]);

        $validated['total_days'] =
            \Carbon\Carbon::parse($validated['from_date'])
                ->diffInDays(
                    \Carbon\Carbon::parse($validated['to_date'])
                ) + 1;

        if ($validated['status'] != 'Pending') {

            $validated['approved_at'] = now();

        }

        $leaveRequest->update($validated);

        return redirect()
            ->route('leave-requests.index')
            ->with('success', 'Leave request updated successfully.');
    }

    public function destroy(LeaveRequest $leaveRequest)
    {
        $leaveRequest->delete();

        return redirect()
            ->route('leave-requests.index')
            ->with('success', 'Leave request deleted successfully.');
    }
}