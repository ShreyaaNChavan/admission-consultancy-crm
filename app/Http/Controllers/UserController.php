<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display all users.
     */
    public function index(Request $request)
    {
        $query = User::with('role');

        // Search
        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');

            });

        }

        // Role Filter
        if ($request->filled('role')) {

            $query->where('role_id', $request->role);

        }

        $users = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $roles = Role::orderBy('role_name')->get();

        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $roles = Role::orderBy('role_name')->get();

        // Employees without login account
        $employees = Employee::whereNull('user_id')
            ->orderBy('full_name')
            ->get();

        return view('users.create', compact('roles', 'employees'));
    }

    /**
     * Store new user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'employee_id' => 'required|exists:employees,id',

            'password' => 'required|min:6|confirmed',

            'role_id' => 'required|exists:roles,id',

        ]);

        $employee = Employee::findOrFail($validated['employee_id']);

        // Create User
        $user = User::create([

            'name' => $employee->full_name,

            'email' => $employee->email,

            'password' => Hash::make($validated['password']),

            'role_id' => $validated['role_id'],

        ]);

        // Link Employee with User
        $employee->user_id = $user->id;
        $employee->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('role_name')->get();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update user.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email,' . $user->id,

            'role_id' => 'required|exists:roles,id',

            'password' => 'nullable|min:6|confirmed',

        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];

        if ($request->filled('password')) {

            $user->password = Hash::make($validated['password']);

        }

        $user->save();

        // Sync Employee Email
        $employee = Employee::where('user_id', $user->id)->first();

        if ($employee) {

            $employee->email = $user->email;
            $employee->save();

        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Delete user.
     */
    public function destroy(User $user)
    {
        // Prevent self delete
        if ($user->id == auth()->id()) {

            return back()->with(
                'error',
                'You cannot delete your own account.'
            );

        }

        // Remove Employee Link
        $employee = Employee::where('user_id', $user->id)->first();

        if ($employee) {

            $employee->user_id = null;
            $employee->save();

        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}