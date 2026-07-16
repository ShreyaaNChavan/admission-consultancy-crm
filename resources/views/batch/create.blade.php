@extends('layouts.app')
@section('page-title', 'Add Batch')
@section('content')

    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">

                Add New Batch

            </h2>

            <p class="mt-2 text-sm font-medium text-gray-500">

                Create a new batch and assign it to a course.

            </p>

        </div>

        <form action="{{ route('batches.store') }}" method="POST">

            @csrf

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-gray-200 px-8 py-5">

                    <h3 class="text-lg font-semibold text-gray-900">

                        Batch Information

                    </h3>

                </div>

                {{-- Form --}}
                <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                    {{-- Course --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Course

                        </label>

                        <select name="course_id" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">

                                Select Course

                            </option>

                            @foreach($courses as $course)

                                <option value="{{ $course->id }}">

                                    {{ $course->course_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Batch Name --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Batch Name

                        </label>

                        <input type="text" name="batch_name" placeholder="DevOps Morning Batch" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Faculty
                        </label>

                        <select name="faculty_id" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">
                                Select Faculty
                            </option>

                            @foreach($faculties as $faculty)

                                <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>

                                    {{ $faculty->full_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>
                    
                    {{-- Timing --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Batch Timing

                        </label>

                        <input type="text" name="timing" placeholder="10:00 AM - 12:00 PM"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Start Date --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Start Date

                        </label>

                        <input type="date" name="start_date"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- End Date --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            End Date

                        </label>

                        <input type="date" name="end_date"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Capacity --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Batch Capacity

                        </label>

                        <input type="number" name="capacity" placeholder="100"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Status --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Status

                        </label>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="1">

                                Active

                            </option>

                            <option value="0">

                                Inactive

                            </option>

                        </select>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="flex justify-end gap-4 border-t border-gray-200 px-8 py-5">

                    <a href="{{ route('batches.index') }}"
                        class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                        Save Batch

                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection