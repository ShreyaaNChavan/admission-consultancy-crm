<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display Course List
     */
    public function index(Request $request)
    {
        $query = Course::query();

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('course_code', 'like', "%{$search}%")
                    ->orWhere('course_name', 'like', "%{$search}%");

            });
        }

        // Status Filter
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        // Pagination
        $courses = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('master.courses.index', compact('courses'));
    }

    /**
     * Show Create Form
     */
    public function create()
    {
        return view('master.courses.create');
    }

    /**
     * Store Course
     */
    public function store(Request $request)
    {
        $request->validate([

            'course_code' => 'required|unique:courses',

            'course_name' => 'required',

            'duration' => 'nullable|numeric',

            'status' => 'required',

        ]);

        Course::create([

            'course_code' => $request->course_code,

            'course_name' => $request->course_name,

            'duration' => $request->duration,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course Added Successfully');
    }
}