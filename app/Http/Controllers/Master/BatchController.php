<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Faculty;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::with([
            'course',
            'faculty'
        ])->latest()->get();

        return view('batch.index', compact('batches'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)
            ->orderBy('course_name')
            ->get();

        $faculties = Faculty::where('status', 'Active')
            ->orderBy('full_name')
            ->get();

        return view(
            'batch.create',
            compact(
                'courses',
                'faculties'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'course_id' => 'required',

            'batch_name' => 'required',

            'faculty_id' => 'required',

            'start_date' => 'required',

            'end_date' => 'required',

            'timing' => 'required',

            'capacity' => 'required|numeric',

        ]);

        Batch::create([

            'course_id' => $request->course_id,

            'batch_name' => $request->batch_name,

            'faculty_id' => $request->faculty_id,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'timing' => $request->timing,

            'capacity' => $request->capacity,

            'status' => $request->status ?? 1,

        ]);

        return redirect()
            ->route('batches.index')
            ->with('success', 'Batch Created Successfully');
    }

    public function edit(Batch $batch)
    {
        $courses = Course::where('status', 1)->get();

        $faculties = Faculty::where('status', 'Active')->get();

        return view(
            'batch.edit',
            compact(
                'batch',
                'courses',
                'faculties'
            )
        );
    }

    public function update(Request $request, Batch $batch)
    {
        $request->validate([

            'course_id' => 'required',

            'batch_name' => 'required',

            'faculty_id' => 'required',

            'start_date' => 'required',

            'end_date' => 'required',

            'timing' => 'required',

            'capacity' => 'required|numeric',

        ]);

        $batch->update([

            'course_id' => $request->course_id,

            'batch_name' => $request->batch_name,

            'faculty_id' => $request->faculty_id,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'timing' => $request->timing,

            'capacity' => $request->capacity,

            'status' => $request->status ?? 1,

        ]);

        return redirect()
            ->route('batches.index')
            ->with('success', 'Batch Updated Successfully');
    }
}