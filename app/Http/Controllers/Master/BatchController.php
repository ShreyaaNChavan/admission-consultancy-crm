<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::with('course')->latest()->get();

        return view('batch.index', compact('batches'));
    }

    public function create()
    {
        $courses = Course::where('status',1)
                    ->orderBy('course_name')
                    ->get();

        return view('batch.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'course_id'=>'required',

            'batch_name'=>'required',

            'trainer_name'=>'required',

            'start_date'=>'required',

            'end_date'=>'required',

            'timing'=>'required',

            'capacity'=>'required|numeric'

        ]);

        Batch::create($request->all());

        return redirect()
            ->route('batches.index')
            ->with('success','Batch Created Successfully');
    }

    public function edit(Batch $batch)
    {
        $courses = Course::all();

        return view('batch.edit',compact('batch','courses'));
    }

    public function update(Request $request,Batch $batch)
    {
        $batch->update($request->all());

        return redirect()
            ->route('batches.index')
            ->with('success','Batch Updated Successfully');
    }
}