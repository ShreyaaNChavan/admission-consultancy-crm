<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with([
            'course',
            'batch',
            'invoice'
        ]);

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('student_code', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");

            });

        }

        // Course
        if ($request->filled('course')) {

            $query->where('course_id', $request->course);

        }

        // Batch
        if ($request->filled('batch')) {

            $query->where('batch_id', $request->batch);

        }

        // Status
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $students = $query->latest()->get();

        $courses = \App\Models\Course::orderBy('course_name')->get();

        $batches = \App\Models\Batch::orderBy('batch_name')->get();

        return view('student.index', compact(
            'students',
            'courses',
            'batches'
        ));
    }

    public function show(Student $student)
    {
        $student->load([

            'course',

            'batch',

            'invoice.payments',

            'attendances'

        ]);

        return view(
            'student.show',
            compact('student')
        );
    }
}