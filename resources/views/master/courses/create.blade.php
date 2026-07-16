@extends('layouts.app')

@section('page-title', 'Add Course')

@section('content')

    <div class="mx-auto max-w-5xl">

        {{-- Page Header --}}
        <div class="mb-8">

            <h1 class="text-2xl font-semibold text-gray-800">
                Add New Course
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Create a new course available for student admissions.
            </p>

        </div>

        <form action="{{ route('courses.store') }}" method="POST">

            @csrf

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-gray-100 px-8 py-5">

                    <h2 class="text-lg font-semibold text-gray-800">
                        Course Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Enter the details of the course.
                    </p>

                </div>

                {{-- Form Body --}}
                <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                    {{-- Course Code --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Course Code
                        </label>

                        <input type="text" name="course_code" value="{{ old('course_code') }}" placeholder="AUTO101"
                            required
                            class="h-11 w-full rounded-xl border border-gray-300 bg-white px-4 text-sm text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('course_code')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Course Name --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Course Name
                        </label>

                        <input type="text" name="course_name" value="{{ old('course_name') }}"
                            placeholder="Automation Engineering" required
                            class="h-11 w-full rounded-xl border border-gray-300 bg-white px-4 text-sm text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('course_name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Duration --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Duration (Months)
                        </label>

                        <input type="number" name="duration" value="{{ old('duration') }}" placeholder="6" min="1"
                            class="h-11 w-full rounded-xl border border-gray-300 bg-white px-4 text-sm text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('duration')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Status --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Status
                        </label>

                        <select name="status"
                            class="h-11 w-full rounded-xl border border-gray-300 bg-white px-4 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="1" selected>
                                Active
                            </option>

                            <option value="0">
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="flex items-center justify-end gap-4 border-t border-gray-100 bg-gray-50 px-8 py-5">

                    <a href="{{ route('courses.index') }}"
                        class="rounded-xl border border-gray-300 bg-white px-6 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700">

                        Save Course

                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection