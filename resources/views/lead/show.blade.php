@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6">

    Lead Details

</h2>

@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">

    {{ session('success') }}

</div>

@endif

<div class="bg-white shadow rounded p-6">

    <div class="grid grid-cols-2 gap-6">

        <div>

            <label class="font-semibold">Lead Code</label>

            <p>{{ $lead->lead_code }}</p>

        </div>

        <div>

            <label class="font-semibold">Full Name</label>

            <p>{{ $lead->full_name }}</p>

        </div>

        <div>

            <label class="font-semibold">Phone</label>

            <p>{{ $lead->phone }}</p>

        </div>

        <div>

            <label class="font-semibold">Email</label>

            <p>{{ $lead->email }}</p>

        </div>

        <div>

            <label class="font-semibold">Course</label>

            <p>{{ $lead->course?->course_name }}</p>

        </div>

        <div>

            <label class="font-semibold">Lead Source</label>

            <p>{{ $lead->source?->source_name }}</p>

        </div>

        <div>

            <label class="font-semibold">Status</label>

            <p>{{ $lead->status }}</p>

        </div>

        <div>

            <label class="font-semibold">Remarks</label>

            <p>{{ $lead->remarks ?? '-' }}</p>

        </div>

    </div>

</div>

<br>

<div class="bg-white shadow rounded p-6">

    <h3 class="text-xl font-semibold mb-4">

        Assign Counselor

    </h3>

    <form action="{{ route('leads.assign',$lead) }}" method="POST">

        @csrf

        <select
            name="assigned_to"
            class="border w-full p-2 rounded">

            <option value="">Select Counselor</option>

            @foreach($counselors as $counselor)

                <option
                    value="{{ $counselor->id }}"
                    {{ $lead->assigned_to == $counselor->id ? 'selected' : '' }}>

                    {{ $counselor->name }}

                </option>

            @endforeach

        </select>

        <button
            class="mt-5 bg-blue-600 text-white px-6 py-2 rounded">

            Assign Counselor

        </button>

    </form>

</div>

@endsection