<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with([
            'course',
            'batch',
            'invoice'
        ])->latest()->get();

        return view('student.index', compact('students'));
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