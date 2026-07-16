<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeadSource;

class LeadSourceController extends Controller
{
    public function index(Request $request)
    {
        $query = LeadSource::query();

        // Search
        if ($request->filled('search')) {

            $query->where('source_name', 'like', '%' . $request->search . '%');

        }

        // Status Filter
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $sources = $query->latest()
                         ->paginate(10)
                         ->withQueryString();

        return view('master.lead-sources.index', compact('sources'));
    }

    public function create()
    {
        return view('master.lead-sources.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'source_name' => 'required|unique:lead_sources',

        ]);

        LeadSource::create([

            'source_name' => $request->source_name,

            'status' => true,

        ]);

        return redirect()
            ->route('lead-sources.index')
            ->with('success', 'Lead Source Added Successfully');
    }
}