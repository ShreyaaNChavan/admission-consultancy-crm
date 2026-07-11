@extends('layouts.app')

@section('content')

    <h2 class="text-3xl font-bold mb-6">

        Add Batch

    </h2>

    <form action="{{ route('batches.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-5">

            <div>

                <label>Course</label>

                <select name="course_id" class="border w-full p-2 rounded">

                    @foreach($courses as $course)

                        <option value="{{ $course->id }}">

                            {{ $course->course_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div>

                <label>Batch Name</label>

                <input type="text" name="batch_name" class="border w-full p-2 rounded">

            </div>

            <div>

                <label>Trainer Name</label>

                <input type="text" name="trainer_name" class="border w-full p-2 rounded">

            </div>

            <div>

                <label>Timing</label>

                <input type="text" name="timing" class="border w-full p-2 rounded">

            </div>

            <div>

                <label>Start Date</label>

                <input type="date" name="start_date" class="border w-full p-2 rounded">

            </div>

            <div>

                <label>End Date</label>

                <input type="date" name="end_date" class="border w-full p-2 rounded">

            </div>

            <div>

                <label>Capacity</label>

                <input type="number" name="capacity" class="border w-full p-2 rounded">

            </div>

            <div>

                <label>Status</label>

                <select name="status" class="border w-full p-2 rounded">

                    <option value="1">Active</option>

                    <option value="0">Inactive</option>

                </select>

            </div>

        </div>

        <button class="mt-6 bg-blue-600 text-white px-6 py-2 rounded">

            Save Batch

        </button>

    </form>

@endsection