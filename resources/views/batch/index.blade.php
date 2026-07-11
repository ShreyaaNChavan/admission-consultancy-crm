@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-3xl font-bold">

            Batches

        </h2>

        <a href="{{ route('batches.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded">

            + Add Batch

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3 text-left">Batch</th>

                    <th class="p-3 text-left">Course</th>

                    <th class="p-3 text-left">Trainer</th>

                    <th class="p-3 text-left">Timing</th>

                    <th class="p-3 text-left">Capacity</th>

                    <th class="p-3 text-left">Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($batches as $batch)

                    <tr class="border-b">

                        <td class="p-3">{{ $batch->batch_name }}</td>

                        <td class="p-3">{{ $batch->course->course_name }}</td>

                        <td class="p-3">{{ $batch->trainer_name }}</td>

                        <td class="p-3">{{ $batch->timing }}</td>

                        <td class="p-3">{{ $batch->capacity }}</td>

                        <td class="p-3">

                            {{ $batch->status ? 'Active' : 'Inactive' }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center p-5">

                            No Batches Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection