@extends('layouts.app')

@section('page-title', 'Edit Admission')

@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <!-- <h1 class="text-3xl font-bold text-gray-900">
                    Edit Admission
                </h1> -->

                <p class="mt-1 text-gray-500">
                    Update admission details for the selected student.
                </p>

            </div>

            <a href="{{ route('admissions.show', $student) }}"
                class="rounded-xl border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">

                Back

            </a>

        </div>


        <form action="{{ route('admissions.update', $student) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="rounded-2xl border border-gray-200 bg-white p-8">

                <div class="mb-8">

                    <h2 class="text-xl font-semibold text-gray-900">
                        Admission Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Modify batch and fee structure details.
                    </p>

                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                    {{-- Student --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Student

                        </label>

                        <input type="text" value="{{ $student->full_name }}" disabled
                            class="w-full rounded-xl border border-gray-300 bg-gray-100 px-4 py-3 text-sm font-medium text-gray-700">

                    </div>

                    {{-- Student Code --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Student Code

                        </label>

                        <input type="text" value="{{ $student->student_code }}" disabled
                            class="w-full rounded-xl border border-gray-300 bg-gray-100 px-4 py-3 text-sm font-medium text-gray-700">

                    </div>

                    {{-- Batch --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Batch

                        </label>

                        <select name="batch_id" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                            <option value="">
                                Select Batch
                            </option>

                            @foreach($batches as $batch)

                                <option value="{{ $batch->id }}" {{ $student->batch_id == $batch->id ? 'selected' : '' }}>

                                    {{ $batch->batch_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Fee Structure --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Fee Structure

                        </label>

                        <select name="fee_structure_id" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                            <option value="">
                                Select Fee Structure
                            </option>

                            @foreach($feeStructures as $fee)

                                <option value="{{ $fee->id }}" {{ $student->fee_structure_id == $fee->id ? 'selected' : '' }}>

                                    {{ $fee->fee_name }} (₹{{ number_format($fee->amount) }})

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="mt-10 flex flex-wrap justify-end gap-3">

                    <a href="{{ route('admissions.show', $student) }}"
                        class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">

                        Update Admission

                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection