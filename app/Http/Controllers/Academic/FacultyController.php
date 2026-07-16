<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Faculty::query();

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('faculty_code', 'like', "%{$search}%")
                    ->orWhere('full_name', 'like', "%{$search}%")
                    ->orWhere('qualification', 'like', "%{$search}%")
                    ->orWhere('specialization', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");

            });
        }

        // Status Filter
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $faculties = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('faculty.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'faculty_code' => 'required|unique:faculties,faculty_code',

            'full_name' => 'required',

            'qualification' => 'required',

            'specialization' => 'required',

            'phone' => 'required',

            'email' => 'required|email|unique:faculties,email',

            'status' => 'required',

        ]);

        Faculty::create([

            'faculty_code' => $request->faculty_code,

            'full_name' => $request->full_name,

            'qualification' => $request->qualification,

            'specialization' => $request->specialization,

            'phone' => $request->phone,

            'email' => $request->email,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('faculties.index')
            ->with('success', 'Faculty Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        return view('faculty.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return view('faculty.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([

            'faculty_code' => 'required|unique:faculties,faculty_code,' . $faculty->id,

            'full_name' => 'required',

            'qualification' => 'required',

            'specialization' => 'required',

            'phone' => 'required',

            'email' => 'required|email|unique:faculties,email,' . $faculty->id,

            'status' => 'required',

        ]);

        $faculty->update([

            'faculty_code' => $request->faculty_code,

            'full_name' => $request->full_name,

            'qualification' => $request->qualification,

            'specialization' => $request->specialization,

            'phone' => $request->phone,

            'email' => $request->email,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('faculties.index')
            ->with('success', 'Faculty Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect()
            ->route('faculties.index')
            ->with('success', 'Faculty Deleted Successfully.');
    }
}