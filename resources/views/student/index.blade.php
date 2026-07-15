@extends('layouts.app')

@section('page-title','Employees')

@section('content')
    <div class="flex justify-between items-center mb-6">

        <h2 class="text-3xl font-bold">
            Students
        </h2>

    </div>

    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3 text-left">Student Code</th>

                    <th class="p-3 text-left">Name</th>

                    <th class="p-3 text-left">Course</th>

                    <th class="p-3 text-left">Batch</th>

                    <th class="p-3 text-left">Fee Status</th>

                    <th class="p-3 text-left">Status</th>

                    <th class="p-3 text-left">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($students as $student)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-3">

                            {{ $student->student_code }}

                        </td>

                        <td class="p-3">

                            {{ $student->full_name }}

                        </td>

                        <td class="p-3">

                            {{ $student->course?->course_name }}

                        </td>

                        <td class="p-3">

                            {{ $student->batch?->batch_name ?? '-' }}

                        </td>

                        <td class="p-3">

                            {{ $student->invoice?->status ?? '-' }}

                        </td>

                        <td class="p-3">

                            {{ $student->status }}

                        </td>

                        <td class="p-3">

                            <a href="{{ route('students.show', $student) }}"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

                                View

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center p-5 text-gray-500">

                            No Students Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection