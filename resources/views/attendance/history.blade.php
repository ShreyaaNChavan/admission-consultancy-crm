@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h2 class="text-3xl font-bold">

        Attendance History

    </h2>

    <a href="{{ route('attendance.index') }}"
       class="bg-gray-600 text-white px-5 py-2 rounded hover:bg-gray-700">

        Back

    </a>

</div>

<div class="bg-white shadow rounded p-6 mb-6">

    <h3 class="text-xl font-semibold mb-3">

        Batch Details

    </h3>

    <p>

        <strong>Batch :</strong>

        {{ $batch->batch_name }}

    </p>

    <p>

        <strong>Course :</strong>

        {{ $batch->course?->course_name }}

    </p>

</div>

<div class="bg-white shadow rounded overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-200">

            <tr>

                <th class="p-3 text-left">

                    Date

                </th>

                <th class="p-3 text-left">

                    Student

                </th>

                <th class="p-3 text-left">

                    Status

                </th>

            </tr>

        </thead>

        <tbody>

        @forelse($attendances as $attendance)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-3">

                    {{ \Carbon\Carbon::parse($attendance->attendance_date)->format('d M Y') }}

                </td>

                <td class="p-3">

                    {{ $attendance->student?->full_name }}

                </td>

                <td class="p-3">

                    @if($attendance->status == 'Present')

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded">

                            Present

                        </span>

                    @elseif($attendance->status == 'Absent')

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded">

                            Absent

                        </span>

                    @else

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">

                            Late

                        </span>

                    @endif

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="3" class="text-center p-6 text-gray-500">

                    No Attendance Found

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection