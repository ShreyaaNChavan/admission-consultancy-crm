@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold">
        Edit Admission
    </h2>
</div>

<form action="{{ route('admissions.update', $student) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="bg-white shadow rounded p-6">

        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-semibold">Batch</label>

                <select name="batch_id" class="border w-full p-2 rounded" required>

                    <option value="">Select Batch</option>

                    @foreach($batches as $batch)

                        <option value="{{ $batch->id }}"
                            {{ $student->batch_id == $batch->id ? 'selected' : '' }}>

                            {{ $batch->batch_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div>
                <label class="block mb-2 font-semibold">Fee Structure</label>

                <select name="fee_structure_id" class="border w-full p-2 rounded" required>

                    <option value="">Select Fee Structure</option>

                    @foreach($feeStructures as $fee)

                        <option value="{{ $fee->id }}"
                            {{ $student->fee_structure_id == $fee->id ? 'selected' : '' }}>

                            {{ $fee->fee_name }} - ₹{{ $fee->amount }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <button
            class="mt-6 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">

            Save Admission

        </button>

    </div>

</form>

@endsection