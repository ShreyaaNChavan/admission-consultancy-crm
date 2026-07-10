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

    @if(
            Auth::user()->role->role_name == 'Super Admin' ||
            Auth::user()->role->role_name == 'Sales Manager'
        )

        <div class="bg-white shadow rounded p-6">

            <h3 class="text-xl font-semibold mb-4">
                Assign Counselor
            </h3>

            <form action="{{ route('leads.assign', $lead) }}" method="POST">

                @csrf

                <select name="assigned_to" class="border w-full p-2 rounded">

                    <option value="">Select Counselor</option>

                    @foreach($counselors as $counselor)

                        <option value="{{ $counselor->id }}" {{ $lead->assigned_to == $counselor->id ? 'selected' : '' }}>

                            {{ $counselor->name }}

                        </option>

                    @endforeach

                </select>

                <button class="mt-5 bg-blue-600 text-white px-6 py-2 rounded">
                    Assign Counselor
                </button>

            </form>

        </div>

        <br>

    @endif

    <div class="bg-white shadow rounded p-6">

        <h2 class="text-2xl font-bold mb-5">
            Follow-up History
        </h2>

        @if($followups->count())

            <div class="space-y-4">

                @foreach($followups as $followup)

                    <div class="border rounded p-4 bg-gray-50">

                        <p>
                            <strong>Follow-up Date :</strong>
                            {{ $followup->followup_date }}
                        </p>

                        <p>

                            <strong>Follow-up By :</strong>

                            {{ $followup->counselor?->name }}

                        </p>

                        <p>
                            <strong>Communication :</strong>
                            {{ $followup->followup_type }}
                        </p>

                        <p>
                            <strong>Remarks :</strong>
                            {{ $followup->remarks }}
                        </p>

                        <p>
                            <strong>Next Follow-up :</strong>
                            {{ $followup->next_followup ?? '-' }}
                        </p>

                    </div>

                @endforeach

            </div>

        @else

            <p class="text-gray-500">
                No Follow-up History Found.
            </p>

        @endif

        <hr class="my-8">

        <h2 class="text-2xl font-bold mb-5">
            Add Follow-up
        </h2>

        <form action="{{ route('followups.store', $lead) }}" method="POST">

            @csrf

            <div class="grid grid-cols-2 gap-5">

                <div>
                    <label>Follow-up Date</label>
                    <input type="date" name="followup_date" class="border w-full p-2 rounded" required>
                </div>

                <div>
                    <label>Follow-up Type</label>

                    <select name="followup_type" class="border w-full p-2 rounded">

                        <option>Call</option>
                        <option>WhatsApp</option>
                        <option>Email</option>
                        <option>Walk-in</option>
                        <option>Meeting</option>

                    </select>

                </div>

                <div class="col-span-2">

                    <label>Remarks</label>

                    <textarea name="remarks" class="border w-full p-2 rounded" rows="4"></textarea>

                </div>

                <div>

                    <label>Next Follow-up</label>

                    <input type="date" name="next_followup" class="border w-full p-2 rounded">

                </div>

                <div>

                    <label>Lead Status</label>

                    <select name="lead_status" class="border w-full p-2 rounded">

                        <option value="Assigned" {{ $lead->status == 'Assigned' ? 'selected' : '' }}>
                            Assigned
                        </option>

                        <option value="Contacted" {{ $lead->status == 'Contacted' ? 'selected' : '' }}>
                            Contacted
                        </option>

                        <option value="Follow-up" {{ $lead->status == 'Follow-up' ? 'selected' : '' }}>
                            Follow-up
                        </option>

                        <option value="Interested" {{ $lead->status == 'Interested' ? 'selected' : '' }}>
                            Interested
                        </option>

                        <option value="Not Interested" {{ $lead->status == 'Not Interested' ? 'selected' : '' }}>
                            Not Interested
                        </option>

                        <option value="Converted" {{ $lead->status == 'Converted' ? 'selected' : '' }}>
                            Converted
                        </option>

                    </select>

                </div>

            </div>

            <button class="mt-5 bg-green-600 text-white px-6 py-2 rounded">
                Save Follow-up
            </button>

        </form>

    </div>

@endsection