<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('role');

        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');

            });

        }

        if ($request->filled('role')) {

            $query->where('role_id', $request->role);

        }

        $users = $query->latest()->paginate(10)->withQueryString();

        $roles = Role::orderBy('role_name')->get();

        return view('users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::orderBy('role_name')->get();

        $employees = Employee::whereNotIn('email', function ($query) {
            $query->select('email')->from('users');
        })->orderBy('full_name')->get();

        return view('users.create', compact('roles', 'employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'employee_id' => 'required|exists:employees,id',

            'password' => 'required|confirmed|min:6',

            'role_id' => 'required|exists:roles,id',

        ]);

        $employee = Employee::findOrFail($validated['employee_id']);

        User::create([

            'name' => $employee->full_name,

            'email' => $employee->email,

            'password' => Hash::make($validated['password']),

            'role_id' => $validated['role_id'],

        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('role_name')->get();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email,' . $user->id,

            'role_id' => 'required|exists:roles,id',

            'password' => 'nullable|confirmed|min:6',

        ]);

        $user->name = $validated['name'];

        $user->email = $validated['email'];

        $user->role_id = $validated['role_id'];

        if ($request->filled('password')) {

            $user->password = Hash::make($request->password);

        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->id == auth()->id()) {

            return back()->with('error', 'You cannot delete your own account.');

        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}