<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLeads = Lead::count();

        $interestedLeads = Lead::where(
            'status',
            'Interested'
        )->count();

        $totalStudents = Student::count();

        $activeStudents = Student::where(
            'status',
            'Active'
        )->count();

        $employees = Employee::count();

        $totalRevenue = Invoice::where(
            'status',
            'Paid'
        )->sum('total_amount');

        $pendingFees = Invoice::where(
            'status',
            '!=',
            'Paid'
        )->sum('total_amount');

        $todayAttendance = Attendance::whereDate(
            'attendance_date',
            today()
        )->count();

        $todayPresent = Attendance::whereDate(
            'attendance_date',
            today()
        )->where(
            'status',
            'Present'
        )->count();

        $attendancePercentage = 0;

        if ($todayAttendance > 0) {

            $attendancePercentage = round(
                ($todayPresent / $todayAttendance) * 100
            );

        }

        return view(
            'dashboard',
            compact(

                'totalLeads',

                'interestedLeads',

                'totalStudents',

                'activeStudents',

                'employees',

                'totalRevenue',

                'pendingFees',

                'attendancePercentage'

            )
        );
    }
}