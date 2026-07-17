@extends('layouts.app')

@section('page-title', 'Create User')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-2xl shadow border border-gray-200 p-8">

            <h2 class="text-2xl font-bold mb-6">

                Create ERP Login

            </h2>

            <form action="{{ route('users.store') }}" method="POST">

                @csrf

                {{-- Employee --}}
                <div class="mb-5">

                    <label class="block mb-2 font-medium">

                        Employee

                    </label>

                    <select id="employee" name="employee_id" class="w-full rounded-lg border-gray-300">

                        <option value="">Select Employee</option>

                        @foreach($employees as $employee)

                            <option value="{{ $employee->id }}" data-name="{{ $employee->full_name }}"
                                data-email="{{ $employee->email }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>

                                {{ $employee->employee_code }} - {{ $employee->full_name }}

                            </option>

                        @endforeach

                    </select>

                    @error('employee_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Name --}}
                <div class="mb-5">

                    <label class="block mb-2 font-medium">

                        Name

                    </label>

                    <input id="name" type="text" readonly class="w-full rounded-lg border-gray-300 bg-gray-100">

                </div>

                {{-- Email --}}
                <div class="mb-5">

                    <label class="block mb-2 font-medium">

                        Email

                    </label>

                    <input id="email" type="text" readonly class="w-full rounded-lg border-gray-300 bg-gray-100">

                </div>

                {{-- Role --}}
                <div class="mb-5">

                    <label class="block mb-2 font-medium">

                        Role

                    </label>

                    <select name="role_id" class="w-full rounded-lg border-gray-300">

                        @foreach($roles as $role)

                            <option value="{{ $role->id }}">

                                {{ $role->role_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Password --}}
                <div class="mb-5">

                    <label class="block mb-2 font-medium">

                        Password

                    </label>

                    <input type="password" name="password" class="w-full rounded-lg border-gray-300">

                </div>

                {{-- Confirm --}}
                <div class="mb-6">

                    <label class="block mb-2 font-medium">

                        Confirm Password

                    </label>

                    <input type="password" name="password_confirmation" class="w-full rounded-lg border-gray-300">

                </div>

                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">

                    Create User

                </button>

            </form>

        </div>

    </div>

    <script>

        const employee = document.getElementById('employee');

        employee.addEventListener('change', function () {

            const option = this.options[this.selectedIndex];

            document.getElementById('name').value = option.dataset.name || '';

            document.getElementById('email').value = option.dataset.email || '';

        });

    </script>

@endsection