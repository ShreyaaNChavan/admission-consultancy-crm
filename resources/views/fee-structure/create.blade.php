@extends('layouts.app')

@section('content')

    <h2 class="text-3xl font-bold mb-6">

        Add Fee Structure

    </h2>

    <form action="{{ route('fee-structures.store') }}" method="POST">

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

                <label>Fee Plan</label>

                <input type="text" name="fee_name" class="border w-full p-2 rounded"
                    placeholder="Regular / Scholarship / Installment">

            </div>

            <div>

                <label>Amount</label>

                <input type="number" name="amount" class="border w-full p-2 rounded">

            </div>

            <div>

                <label>Status</label>

                <select name="status" class="border w-full p-2 rounded">

                    <option value="1">

                        Active

                    </option>

                    <option value="0">

                        Inactive

                    </option>

                </select>

            </div>

        </div>

        <button class="mt-6 bg-blue-600 text-white px-6 py-2 rounded">

            Save Fee Structure

        </button>

    </form>

@endsection