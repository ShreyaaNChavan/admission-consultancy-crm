<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Course;
use App\Models\LeadSource;
use App\Models\User;
use App\Models\Role;
class LeadController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role->role_name == 'Super Admin' || $user->role->role_name == 'Sales Manager') {

            $leads = Lead::latest()->get();

        } elseif ($user->role->role_name == 'Counselor') {

            $leads = Lead::where('assigned_to', $user->id)
                ->latest()
                ->get();

        } else {

            $leads = collect();

        }

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

    public function show(Lead $lead)
    {
        $counselorRole = Role::where('role_name', 'Counselor')->first();

        $counselors = User::where('role_id', $counselorRole->id)
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        $followups = $lead->followups()->latest()->get();

        return view(
            'lead.show',
            compact(
                'lead',
                'counselors',
                'followups'
            )
        );
    }


    public function assignCounselor(Request $request, Lead $lead)
    {
        $user = auth()->user();

        if (
            $user->role->role_name != 'Super Admin' &&
            $user->role->role_name != 'Sales Manager'
        ) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'assigned_to' => 'required|exists:users,id',
        ]);

        $lead->update([
            'assigned_to' => $request->assigned_to,
            'status' => 'Assigned',
        ]);

        return redirect()
            ->route('leads.show', $lead)
            ->with('success', 'Counselor assigned successfully.');
    }
}