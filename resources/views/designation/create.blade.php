@extends('layouts.app')

@section('page-title', 'Add Designation')

@section('content')

    <div class="max-w-5xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">

                Add New Designation

            </h2>

            <p class="mt-2 text-sm font-medium text-gray-500">

                Create a new employee designation.

            </p>

        </div>

        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-300 bg-red-50 p-4 text-red-700">

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('designations.store') }}" method="POST">

            @csrf

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-gray-200 px-8 py-5">

                    <h3 class="text-lg font-semibold text-gray-900">

                        Designation Information

                    </h3>

                </div>

                {{-- Form --}}
                <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                    {{-- Designation Name --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Designation Name

                        </label>

                        <input type="text" name="designation_name" value="{{ old('designation_name') }}"
                            placeholder="Faculty" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Status --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Status

                        </label>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="1">

                                Active

                            </option>

                            <option value="0">

                                Inactive

                            </option>

                        </select>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="flex justify-end gap-4 border-t border-gray-200 px-8 py-5">

                    <a href="{{ route('designations.index') }}"
                        class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                        Save Designation

                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection