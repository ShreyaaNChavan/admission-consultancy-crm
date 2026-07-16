@extends('layouts.app')

@section('page-title','Add Fee Structure')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-900">

            Add Fee Structure

        </h2>

        <p class="mt-2 text-sm font-medium text-gray-500">

            Create a fee plan for a course.

        </p>

    </div>

    <form action="{{ route('fee-structures.store') }}" method="POST">

        @csrf

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            {{-- Card Header --}}
            <div class="border-b border-gray-200 px-8 py-5">

                <h3 class="text-lg font-semibold text-gray-900">

                    Fee Structure Information

                </h3>

            </div>

            {{-- Form --}}
            <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                {{-- Course --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Course

                    </label>

                    <select
                        name="course_id"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <option value="">

                            Select Course

                        </option>

                        @foreach($courses as $course)

                            <option
                                value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}>

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Fee Plan --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Fee Plan

                    </label>

                    <input
                        type="text"
                        name="fee_name"
                        value="{{ old('fee_name') }}"
                        placeholder="Regular / Scholarship / Installment"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                {{-- Amount --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Amount (₹)

                    </label>

                    <input
                        type="number"
                        name="amount"
                        value="{{ old('amount') }}"
                        placeholder="50000"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

                {{-- Status --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">

                        Status

                    </label>

                    <select
                        name="status"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>

            </div>

            {{-- Footer --}}
            <div class="flex justify-end gap-4 border-t border-gray-200 px-8 py-5">

                <a
                    href="{{ route('fee-structures.index') }}"
                    class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                    Save Fee Structure

                </button>

            </div>

        </div>

    </form>

</div>

@endsection