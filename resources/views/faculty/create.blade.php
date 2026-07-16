@extends('layouts.app')

@section('page-title', 'Add Faculty')

@section('content')

    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">

                Add New Faculty

            </h2>

            <p class="mt-2 text-sm font-medium text-gray-500">

                Register a new faculty member.

            </p>

        </div>

        <form action="{{ route('faculties.store') }}" method="POST">

            @csrf

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-gray-200 px-8 py-5">

                    <h3 class="text-lg font-semibold text-gray-900">

                        Faculty Information

                    </h3>

                </div>

                {{-- Form --}}
                <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2">

                    {{-- Faculty Code --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Faculty Code

                        </label>

                        <input type="text" name="faculty_code" value="{{ old('faculty_code') }}" placeholder="FAC011"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Full Name --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Full Name

                        </label>

                        <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Mr. Rahul Sharma"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Qualification --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Qualification

                        </label>

                        <input type="text" name="qualification" value="{{ old('qualification') }}"
                            placeholder="M.Tech Computer Science" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Specialization --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Specialization

                        </label>

                        <input type="text" name="specialization" value="{{ old('specialization') }}"
                            placeholder="Artificial Intelligence" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Phone --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Phone Number

                        </label>

                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="9876543210" required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Email --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Email Address

                        </label>

                        <input type="email" name="email" value="{{ old('email') }}" placeholder="faculty@autosigma.com"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                    {{-- Status --}}
                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Status

                        </label>

                        <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="Active">

                                Active

                            </option>

                            <option value="Inactive">

                                Inactive

                            </option>

                        </select>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="flex justify-end gap-4 border-t border-gray-200 px-8 py-5">

                    <a href="{{ route('faculties.index') }}"
                        class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                        Save Faculty

                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection