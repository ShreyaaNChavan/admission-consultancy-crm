@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-3xl font-bold">
            Fee Structures
        </h2>

        <a href="{{ route('fee-structures.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded">

            + Add Fee Structure

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

                    <th class="p-3 text-left">Course</th>

                    <th class="p-3 text-left">Fee Plan</th>

                    <th class="p-3 text-left">Amount</th>

                    <th class="p-3 text-left">Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($fees as $fee)

                    <tr class="border-b">

                        <td class="p-3">

                            {{ $fee->course->course_name }}

                        </td>

                        <td class="p-3">

                            {{ $fee->fee_name }}

                        </td>

                        <td class="p-3">

                            ₹{{ number_format($fee->amount, 2) }}

                        </td>

                        <td class="p-3">

                            {{ $fee->status ? 'Active' : 'Inactive' }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center p-5">

                            No Fee Structures Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection