@extends('layouts.app')

@section('content')

    <h2 class="text-3xl font-bold mb-6">

        Add New Course

    </h2>

    <form action="{{ route('courses.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-5">

            <div>

                <label>Course Code</label>

                <input type="text" name="course_code" class="border w-full p-2 rounded" required>

            </div>

            <div>

                <label>Course Name</label>

                <input type="text" name="course_name" class="border w-full p-2 rounded" required>

            </div>

            <div>

                <label>Duration (Months)</label>

                <input type="number" name="duration" class="border w-full p-2 rounded">

            </div>

            <div>

                <label>Fees</label>

                <input type="number" name="fees" class="border w-full p-2 rounded">

            </div>

        </div>

        <button class="mt-6 bg-blue-600 text-white px-6 py-2 rounded">

            Save Course

        </button>

    </form>

@endsection