@extends('layouts.app')

@section('page-title','Attendance')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">

                Attendance

            </h2>

            <p class="mt-1 text-sm text-gray-500">

                Manage daily attendance for all batches.

            </p>

        </div>

        <div class="rounded-xl bg-blue-50 px-5 py-3">

            <p class="text-xs font-semibold uppercase tracking-wide text-blue-600">

                Total Batches

            </p>

            <p class="mt-1 text-2xl font-bold text-blue-700">

                {{ $batches->count() }}

            </p>

        </div>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">

            {{ session('success') }}

        </div>

    @endif


    {{-- Table --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="border-b border-gray-200 bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Batch

                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Course

                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Faculty

                        </th>

                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Actions

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">

                    @forelse($batches as $batch)

                        <tr class="transition hover:bg-gray-50">

                            <td class="px-6 py-5">

                                <div class="font-semibold text-gray-900">

                                    {{ $batch->batch_name }}

                                </div>

                            </td>

                            <td class="px-6 py-5 text-gray-700">

                                {{ $batch->course?->course_name }}

                            </td>

                            <td class="px-6 py-5 text-gray-700">

                                {{ $batch->faculty?->full_name ?? '-' }}

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-center gap-3">

                                    <a
                                        href="{{ route('attendance.mark',$batch) }}"
                                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-blue-700">

                                        Mark Attendance

                                    </a>

                                    <a
                                        href="{{ route('attendance.history',$batch) }}"
                                        class="rounded-lg border border-green-600 px-4 py-2 text-sm font-medium text-green-600 transition hover:bg-green-50">

                                        View History

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="px-6 py-14">

                                <div class="flex flex-col items-center">

                                    <svg class="mb-4 h-14 w-14 text-gray-300"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                                    </svg>

                                    <h3 class="text-lg font-semibold text-gray-700">

                                        No Batches Available

                                    </h3>

                                    <p class="mt-2 text-sm text-gray-500">

                                        Create a batch before marking attendance.

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection