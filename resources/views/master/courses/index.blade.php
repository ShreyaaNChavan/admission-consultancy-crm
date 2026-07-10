@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-3xl font-bold">

            Courses

        </h2>

        <a href="{{ route('courses.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded">

            + Add Course

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif

    <table class="w-full bg-white shadow rounded">

        <thead class="bg-gray-200">

            <tr>

                <th class="p-3">Code</th>

                <th class="p-3">Course Name</th>

                <th class="p-3">Duration</th>

                <th class="p-3">Fees</th>

                <th class="p-3">Status</th>

            </tr>

        </thead>

        <tbody>

            @forelse($courses as $course)

                <tr class="border-t">

                    <td class="p-3">{{ $course->course_code }}</td>

                    <td class="p-3">{{ $course->course_name }}</td>

                    <td class="p-3">{{ $course->duration }}</td>

                    <td class="p-3">₹ {{ $course->fees }}</td>

                    <td class="p-3">

                        {{ $course->status ? 'Active' : 'Inactive' }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center p-5">

                        No Courses Found

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

@endsection