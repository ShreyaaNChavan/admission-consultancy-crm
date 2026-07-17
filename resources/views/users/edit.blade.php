@extends('layouts.app')

@section('page-title', 'Edit User')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl shadow border border-gray-200 p-8">

        <h2 class="text-2xl font-bold mb-6">

            Edit User

        </h2>

        <form action="{{ route('users.update', $user) }}" method="POST">

            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Name

                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="w-full rounded-lg border-gray-300"
                    required>

                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            {{-- Email --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="w-full rounded-lg border-gray-300"
                    required>

                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            {{-- Role --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Role

                </label>

                <select
                    name="role_id"
                    class="w-full rounded-lg border-gray-300"
                    required>

                    @foreach($roles as $role)

                        <option
                            value="{{ $role->id }}"
                            {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>

                            {{ $role->role_name }}

                        </option>

                    @endforeach

                </select>

                @error('role_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            <hr class="my-6">

            <h3 class="text-lg font-semibold mb-4">

                Change Password (Optional)

            </h3>

            {{-- Password --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    New Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-lg border-gray-300">

                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">

                <label class="block mb-2 font-medium">

                    Confirm New Password

                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-6 py-3 text-white font-semibold hover:bg-blue-700">

                    Update User

                </button>

                <a
                    href="{{ route('users.index') }}"
                    class="rounded-lg bg-gray-500 px-6 py-3 text-white font-semibold hover:bg-gray-600">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection