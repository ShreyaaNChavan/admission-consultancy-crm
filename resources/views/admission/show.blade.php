@extends('layouts.app')

@section('content')

    <h2 class="text-3xl font-bold mb-6">

        Student Details

    </h2>

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