@extends('layouts.app')

@section('page-title', 'Add Lead')

@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <h1 class="text-3xl font-bold text-gray-900">
                    Add New Lead
                </h1>

                <p class="mt-1 text-gray-500">
                    Register a new enquiry and assign the appropriate course.
                </p>

            </div>

            <a href="{{ route('leads.index') }}"
                class="rounded-xl border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                Back to Leads

            </a>

        </div>

        <form action="{{ route('leads.store') }}" method="POST">

            @csrf

            <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

                {{-- Personal Information --}}
                <div>

                    <h2 class="text-xl font-semibold text-gray-900">
                        Personal Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Basic details of the prospective student.
                    </p>

                </div>

                <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

                    {{-- Full Name --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Full Name
                        </label>

                        <input type="text" name="full_name" value="{{ old('full_name') }}" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                        @error('full_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Phone --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Mobile Number
                        </label>

                        <input type="text" name="phone" value="{{ old('phone') }}" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Email --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Email Address
                        </label>

                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    </div>

                </div>

                <hr class="my-8">

                {{-- Academic Information --}}
                <div>

                    <h2 class="text-xl font-semibold text-gray-900">
                        Academic Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Select the course and enquiry source.
                    </p>

                </div>

                <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

                    {{-- Course --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Course
                        </label>

                        <select name="course_id" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                            <option value="">
                                Select Course
                            </option>

                            @foreach($courses as $course)

                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>

                                    {{ $course->course_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Lead Source --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Lead Source
                        </label>

                        <select name="source_id" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                            <option value="">
                                Select Source
                            </option>

                            @foreach($sources as $source)

                                <option value="{{ $source->id }}" {{ old('source_id') == $source->id ? 'selected' : '' }}>

                                    {{ $source->source_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="mt-6">

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Remarks
                    </label>

                    <textarea name="remarks" rows="5" placeholder="Write additional information about the lead..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">{{ old('remarks') }}</textarea>

                </div>

                {{-- Buttons --}}
                <div class="mt-10 flex justify-end gap-3">

                    <a href="{{ route('leads.index') }}"
                        class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">

                        Save Lead

                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection