<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Batch;
use App\Models\Student;

class AttendanceController extends Controller
{
    public function index()
    {
        $batches = Batch::with('course')
            ->where('status', 1)
            ->get();

        return view('attendance.index', compact('batches'));
    }

    public function mark(Batch $batch)
    {
        $students = Student::where('batch_id', $batch->id)
            ->where('status', 'Active')
            ->get();

        return view(
            'attendance.mark',
            compact(
                'batch',
                'students'
            )
        );
    }

    public function store(Request $request, Batch $batch)
    {
        foreach ($request->attendance as $studentId => $status) {

            Attendance::updateOrCreate(

                [
                    'student_id' => $studentId,
                    'attendance_date' => $request->attendance_date,
                ],

                [
                    'batch_id' => $batch->id,
                    'status' => $status,
                ]

            );

        }

        return redirect()
            ->route('attendance.index')
            ->with('success', 'Attendance saved successfully.');
    }
}