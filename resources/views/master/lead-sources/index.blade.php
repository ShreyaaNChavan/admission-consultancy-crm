@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-5">

        <h2 class="text-3xl font-bold">
            Lead Sources
        </h2>

        <a href="{{ route('lead-sources.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded">

            + Add Source

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

                <th class="p-3 text-left">Source Name</th>

                <th class="p-3 text-left">Status</th>

            </tr>

        </thead>

        <tbody>

            @forelse($sources as $source)

                <tr class="border-b">

                    <td class="p-3">{{ $source->source_name }}</td>

                    <td class="p-3">

                        {{ $source->status ? 'Active' : 'Inactive' }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="2" class="text-center p-5">

                        No Lead Sources Found

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

@endsection