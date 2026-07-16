<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function index(Request $request)
    {
        $query = Designation::query();

        if ($request->filled('search')) {

            $query->where(
                'designation_name',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->filled('status')) {

            $query->where('status', $request->status);
        }

        $designations = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'designation.index',
            compact('designations')
        );
    }

    public function create()
    {
        return view('designation.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'designation_name' => 'required|unique:designations',

            'status' => 'required'

        ]);

        Designation::create([

            'designation_name' => $request->designation_name,

            'status' => $request->status

        ]);

        return redirect()
            ->route('designations.index')
            ->with('success', 'Designation Added Successfully');
    }

    public function edit(Designation $designation)
    {
        return view(
            'designation.edit',
            compact('designation')
        );
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([

            'designation_name' =>
                'required|unique:designations,designation_name,' . $designation->id,

            'status' => 'required'

        ]);

        $designation->update([

            'designation_name' => $request->designation_name,

            'status' => $request->status

        ]);

        return redirect()
            ->route('designations.index')
            ->with('success', 'Designation Updated Successfully');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();

        return redirect()
            ->route('designations.index')
            ->with('success', 'Designation Deleted Successfully');
    }
}