@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-5">

        <h2 class="text-3xl font-bold">
            Lead List
        </h2>

        <a href="{{ route('leads.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">

            + Add Lead

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3 text-left">Lead Code</th>

                    <th class="p-3 text-left">Name</th>

                    <th class="p-3 text-left">Course</th>

                    <th class="p-3 text-left">Source</th>

                    <th class="p-3 text-left">Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($leads as $lead)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-3">
                            {{ $lead->lead_code }}
                        </td>

                        <td class="p-3">
                            {{ $lead->full_name }}
                        </td>

                        <td class="p-3">
                            {{ $lead->course?->course_name ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $lead->source?->source_name ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $lead->status }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center p-5 text-gray-500">

                            No Leads Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection