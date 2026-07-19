<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeProfileController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(403, 'This account is not linked to an employee profile.');
        }
        return view(
            'employee.profile.index',
            compact('employee')
        );
    }
}