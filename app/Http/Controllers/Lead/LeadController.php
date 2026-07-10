<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Course;
use App\Models\LeadSource;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::latest()->get();

        return view('lead.index', compact('leads'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)->orderBy('course_name')->get();

        $sources = LeadSource::where('status', 1)->orderBy('source_name')->get();

        return view('lead.create', compact('courses', 'sources'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'full_name' => 'required',

            'phone' => 'required',

            'course_id' => 'required|exists:courses,id',

            'source_id' => 'required|exists:lead_sources,id',

        ]);

        Lead::create([

            'lead_code' => 'LD' . time(),

            'full_name' => $request->full_name,

            'phone' => $request->phone,

            'email' => $request->email,

            'course_id' => $request->course_id,

            'source_id' => $request->source_id,

            'remarks' => $request->remarks,

            'status' => 'New',

            'created_by' => auth()->id(),

        ]);

        return redirect('/leads')->with('success', 'Lead Added Successfully');

    }
}