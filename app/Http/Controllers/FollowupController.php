<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use App\Models\Lead;
use Illuminate\Http\Request;

class FollowupController extends Controller
{
    public function store(Request $request, Lead $lead)
    {
        $request->validate([

            'followup_date' => 'required|date',

            'followup_type' => 'required',

            'remarks' => 'required',

        ]);

        Followup::create([

            'lead_id' => $lead->id,

            'counselor_id' => auth()->id(),

            'followup_date' => $request->followup_date,

            'followup_type' => $request->followup_type,

            'remarks' => $request->remarks,

            'next_followup' => $request->next_followup,

            'status' => 'Completed',

        ]);

        $lead->update([

            'status' => $request->lead_status,

        ]);

        return redirect()
            ->route('leads.show', $lead)
            ->with('success', 'Follow-up added successfully.');
    }
}