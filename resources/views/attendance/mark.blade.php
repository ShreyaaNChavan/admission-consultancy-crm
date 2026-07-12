@extends('layouts.app')

@section('content')

    <h2 class="text-3xl font-bold mb-6">

        {{ $batch->batch_name }}

    </h2>

    <form action="{{ route('attendance.store', $batch) }}" method="POST">

        @csrf

        <div class="mb-5">

            <label>Attendance Date</label>

            <input type="date" name="attendance_date" value="{{ date('Y-m-d') }}" class="border w-full p-2 rounded">

        </div>

        <table class="w-full bg-white shadow rounded">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3">Student</th>

                    <th class="p-3">Attendance</th>

                </tr>

            </thead>

            <tbody>

                @foreach($students as $student)

                    <tr class="border-b">

                        <td class="p-3">

                            {{ $student->full_name }}

                        </td>

                        <td class="p-3">

                            <select name="attendance[{{ $student->id }}]" class="border p-2 rounded">

                                <option value="Present">Present</option>

                                <option value="Absent">Absent</option>

                                <option value="Late">Late</option>

                            </select>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

        <button class="mt-5 bg-green-600 text-white px-6 py-2 rounded">

            Save Attendance

        </button>

    </form>

@endsection