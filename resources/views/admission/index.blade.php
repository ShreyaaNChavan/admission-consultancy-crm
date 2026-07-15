@extends('layouts.app')
@section('page-title','Admissions')
@section('content')

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-3xl font-bold">

            Students

        </h2>

    </div>

    <div class="bg-white shadow rounded">

        <table class="w-full">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3 text-left">Student Code</th>

                    <th class="p-3 text-left">Name</th>

                    <th class="p-3 text-left">Course</th>

                    <th class="p-3 text-left">Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($students as $student)

                    <tr class="border-b">

                        <td class="p-3">

                            <a href="{{ route('admissions.show', $student) }}" class="text-blue-600 hover:underline">

                                {{ $student->student_code }}

                            </a>

                        </td>

                        <td class="p-3">

                            {{ $student->full_name }}

                        </td>

                        <td class="p-3">

                            {{ $student->course?->course_name }}

                        </td>

                        <td class="p-3">

                            {{ $student->status }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center p-5">

                            No Students Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection