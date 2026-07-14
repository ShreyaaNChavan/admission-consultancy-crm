@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-3xl font-bold">

            Student Details

        </h2>

        <a href="{{ route('admissions.edit', $student) }}"
            class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">

            Edit Admission

        </a>

        @if($student->invoice)

            <a href="{{ route('payments.index', $student->invoice) }}"
                class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">

                Payments

            </a>

        @endif
    </div>

    <div class="bg-white shadow rounded p-6">

        <p><strong>Student Code :</strong> {{ $student->student_code }}</p>

        <p><strong>Name :</strong> {{ $student->full_name }}</p>

        <p><strong>Phone :</strong> {{ $student->phone }}</p>

        <p><strong>Email :</strong> {{ $student->email }}</p>

        <p><strong>Course :</strong> {{ $student->course?->course_name }}</p>

        <p><strong>Admission Date :</strong> {{ $student->admission_date }}</p>

        <p><strong>Status :</strong> {{ $student->status }}</p>

    </div>


@endsection