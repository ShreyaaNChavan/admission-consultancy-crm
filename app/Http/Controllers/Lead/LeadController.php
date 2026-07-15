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
    public function index(Request $request)
    {
        $user = auth()->user();

        if (
            $user->role->role_name == 'Super Admin' ||
            $user->role->role_name == 'Sales Manager'
        ) {

            $query = Lead::query();

        } elseif ($user->role->role_name == 'Counselor') {

            $query = Lead::where('assigned_to', $user->id);

        } else {

            $query = Lead::whereRaw('1=0');

        }

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('lead_code', 'like', "%{$search}%");

            });

        }

        // Status Filter
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        // Source Filter
        if ($request->filled('source')) {

            $query->whereHas('source', function ($q) use ($request) {

                $q->where('source_name', $request->source);

            });

        }

        $leads = $query
            ->with(['course', 'source', 'counselor'])
            ->latest()
            ->get();

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