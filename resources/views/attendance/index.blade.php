@extends('layouts.app')

@section('content')

    <h2 class="text-3xl font-bold mb-6">

        Attendance

    </h2>

    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-5">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white shadow rounded">

        <table class="w-full">
            <table class="w-full">

                <thead class="bg-gray-200">

                    <tr>

                        <th class="p-3 text-left">Batch</th>

                        <th class="p-3 text-left">Course</th>

                        <th class="p-3 text-left">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($batches as $batch)

                        <tr class="border-b">

                            <td class="p-3">

                                {{ $batch->batch_name }}

                            </td>

                            <td class="p-3">

                                {{ $batch->course?->course_name }}

                            </td>

                            <td class="p-3 space-x-2">

                                <a href="{{ route('attendance.mark', $batch) }}"
                                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

                                    Mark Attendance

                                </a>

                                <a href="{{ route('attendance.history', $batch) }}"
                                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">

                                    View History

                                </a>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </table>

    </div>

@endsection