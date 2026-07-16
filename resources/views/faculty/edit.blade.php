@extends('layouts.app')

@section('page-title', 'Edit Faculty')

@section('content')

    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">

                Edit Faculty

            </h2>

            <p class="mt-2 text-sm font-medium text-gray-500">

                Update faculty information.

            </p>

        </div>

        <form action="{{ route('faculties.update', $faculty) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                {{-- Header --}}
                <div class="border-b border-gray-200 px-8 py-5">

                    <h3 class="text-lg font-semibold text-gray-900">

                        Faculty Information

                    </h3>

                </div>

                {{-- Form --}}
                <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Faculty Code

                        </label>

                        <input type="text" name="faculty_code" value="{{ old('faculty_code', $faculty->faculty_code) }}"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Full Name

                        </label>

                        <input type="text" name="full_name" value="{{ old('full_name', $faculty->full_name) }}" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Qualification

                        </label>

                        <input type="text" name="qualification" value="{{ old('qualification', $faculty->qualification) }}"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Specialization

                        </label>

                        <input type="text" name="specialization"
                            value="{{ old('specialization', $faculty->specialization) }}" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Phone Number

                        </label>

                        <input type="text" name="phone" value="{{ old('phone', $faculty->phone) }}" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Email Address

                        </label>

                        <input type="email" name="email" value="{{ old('email', $faculty->email) }}" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Status

                        </label>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="Active" {{ $faculty->status == 'Active' ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="Inactive" {{ $faculty->status == 'Inactive' ? 'selected' : '' }}>

                                Inactive

                            </option>

                        </select>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="flex justify-end gap-4 border-t border-gray-200 px-8 py-5">

                    <a href="{{ route('faculties.index') }}"
                        class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">

                        Update Faculty

                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection