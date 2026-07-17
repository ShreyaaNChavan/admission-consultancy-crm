@extends('layouts.app')

@section('page-title', 'User Management')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="mb-8 flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">

                User Management

            </h2>

            <p class="mt-2 text-sm text-gray-500">

                Manage ERP users and their roles.

            </p>

        </div>

        <a href="{{ route('users.create') }}"
            class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

            + Add User

        </a>

    </div>

    {{-- Search --}}
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white shadow-sm">

        <form method="GET" class="grid grid-cols-1 gap-4 p-6 md:grid-cols-4">

            <div class="md:col-span-2">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search name or email..."
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

            </div>

            <div>

                <select
                    name="role"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    <option value="">All Roles</option>

                    @foreach($roles as $role)

                        <option
                            value="{{ $role->id }}"
                            {{ request('role') == $role->id ? 'selected' : '' }}>

                            {{ $role->role_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div>

                <button
                    class="w-full rounded-xl bg-blue-600 py-3 font-semibold text-white hover:bg-blue-700">

                    Search

                </button>

            </div>

        </form>

    </div>

    {{-- Table --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">

                            Name

                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">

                            Email

                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">

                            Role

                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">

                            Status

                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">

                            Actions

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">

                    @forelse($users as $user)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">

                                <div class="font-semibold text-gray-900">

                                    {{ $user->name }}

                                </div>

                            </td>

                            <td class="px-6 py-4 text-gray-600">

                                {{ $user->email }}

                            </td>

                            <td class="px-6 py-4">

                                <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                                    {{ $user->role->role_name }}

                                </span>

                            </td>

                            <td class="px-6 py-4 text-center">

                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                    Active

                                </span>

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a
                                        href="{{ route('users.edit', $user) }}"
                                        class="rounded-lg bg-indigo-500 px-3 py-2 text-xs font-semibold text-white hover:bg-indigo-600">

                                        Edit

                                    </a>

                                    @if(auth()->id() != $user->id)

                                    <form
                                        action="{{ route('users.destroy', $user) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this user?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white hover:bg-red-700">

                                            Delete

                                        </button>

                                    </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="py-10 text-center text-gray-500">

                                No users found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="border-t border-gray-200 px-6 py-4">

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection