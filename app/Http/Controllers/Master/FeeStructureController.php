<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\FeeStructure;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    public function index(Request $request)
    {
        $fees = FeeStructure::with('course')

            ->when($request->search, function ($query) use ($request) {

                $query->where('fee_name', 'like', '%' . $request->search . '%')
                    ->orWhereHas('course', function ($q) use ($request) {
                        $q->where('course_name', 'like', '%' . $request->search . '%');
                    });

            })

            ->when($request->filled('status'), function ($query) use ($request) {

                $query->where('status', $request->status);

            })

            ->latest()

            ->paginate(10);

        return view('fee-structure.index', compact('fees'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)
            ->orderBy('course_name')
            ->get();

        return view('fee-structure.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'course_id' => 'required',

            'fee_name' => 'required',

            'amount' => 'required|numeric'

        ]);

        FeeStructure::create($request->all());

        return redirect()
            ->route('fee-structures.index')
            ->with('success', 'Fee Structure Added Successfully');
    }

    public function edit(FeeStructure $feeStructure)
    {
        $courses = Course::all();

        return view(
            'fee-structure.edit',
            compact('feeStructure', 'courses')
        );
    }

    public function update(Request $request, FeeStructure $feeStructure)
    {
        $feeStructure->update($request->all());

        return redirect()
            ->route('fee-structures.index')
            ->with('success', 'Fee Structure Updated Successfully');
    }


}