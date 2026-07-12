<?php

namespace App\Http\Controllers\Admission;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\FeeStructure;
use App\Models\Invoice;

class AdmissionController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();

        return view('admission.index', compact('students'));
    }

    public function convert(Lead $lead)
    {
        // Prevent duplicate conversion
        if ($lead->student) {

            return redirect()
                ->route('admissions.show', $lead->student)
                ->with('success', 'Lead already converted.');
        }

        $student = Student::create([

            'student_code' => 'ST' . time(),

            'lead_id' => $lead->id,

            'full_name' => $lead->full_name,

            'phone' => $lead->phone,

            'email' => $lead->email,

            'course_id' => $lead->course_id,

            'batch_id' => null,

            'admission_date' => now(),

            'status' => 'Active',

        ]);

        $lead->update([

            'status' => 'Converted',

        ]);

        return redirect()
            ->route('admissions.show', $student)
            ->with('success', 'Admission completed successfully.');
    }

    public function show(Student $student)
    {
        return view('admission.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $batches = Batch::where('course_id', $student->course_id)
            ->where('status', 1)
            ->get();

        $feeStructures = FeeStructure::where('course_id', $student->course_id)
            ->where('status', 1)
            ->get();

        return view(
            'admission.edit',
            compact(
                'student',
                'batches',
                'feeStructures'
            )
        );
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([

            'batch_id' => 'required',

            'fee_structure_id' => 'required',

        ]);

        $student->update([

            'batch_id' => $request->batch_id,

            'fee_structure_id' => $request->fee_structure_id,

        ]);

        Invoice::create([

            'invoice_no' => 'INV' . time(),

            'student_id' => $student->id,

            $feeStructure = FeeStructure::findOrFail($request->fee_structure_id),

            'total_amount' => $feeStructure->amount,

            'status' => 'Pending',

        ]);

        return redirect()
            ->route('admissions.show', $student)
            ->with('success', 'Admission completed successfully.');
    }
}