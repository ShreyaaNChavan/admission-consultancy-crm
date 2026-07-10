@extends('layouts.app')

@section('content')

    <h2 class="text-3xl font-bold mb-6">

        Add New Lead

    </h2>

    <form action="/leads" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-5">

            <div>

                <label>Full Name</label>

                <input type="text" name="full_name" class="border w-full p-2 rounded" required>

            </div>

            <div>

                <label>Phone</label>

                <input type="text" name="phone" class="border w-full p-2 rounded" required>

            </div>

            <div>

                <label>Email</label>

                <input type="email" name="email" class="border w-full p-2 rounded">

            </div>


            <div>

                <label>Course</label>

                <select name="course_id" class="border w-full p-2 rounded" required>

                    <option value="">Select Course</option>

                    @foreach($courses as $course)

                        <option value="{{ $course->id }}">

                            {{ $course->course_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div>

                <label>Lead Source</label>

                <select name="source_id" class="border w-full p-2 rounded" required>

                    <option value="">Select Source</option>

                    @foreach($sources as $source)

                        <option value="{{ $source->id }}">

                            {{ $source->source_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-span-2">

                <label>Remarks</label>

                <textarea name="remarks" class="border w-full p-2 rounded"></textarea>

            </div>

        </div>

        <button class="mt-5 bg-blue-600 text-white px-6 py-2 rounded">

            Save Lead

        </button>

    </form>

@endsection