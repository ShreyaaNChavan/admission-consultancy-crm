<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();

        return view('master.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('master.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'course_code' => 'required|unique:courses',

            'course_name' => 'required',

        ]);

        Course::create([

            'course_code' => $request->course_code,

            'course_name' => $request->course_name,

            'duration' => $request->duration,

            'fees' => $request->fees,

            'status' => true,

        ]);

        return redirect()->route('courses.index')
                         ->with('success','Course Added Successfully');
    }
}