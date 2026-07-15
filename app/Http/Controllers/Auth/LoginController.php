<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Payment;

class LoginController extends Controller
{
    /**
     * Show Login Page
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Login User
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    /**
     * Dashboard
     */
    public function dashboard()
    {
        $totalLeads = Lead::count();

        $totalStudents = Student::count();

        $totalEmployees = Employee::count();

        $totalRevenue = Payment::sum('amount');

        $pendingFees = Invoice::where('status', 'Pending')->sum('total_amount');

        $recentLeads = Lead::latest()->take(5)->get();

        $recentStudents = Student::latest()->take(5)->get();

        $recentAdmissions = Student::latest()->take(5)->get();

        $recentPayments = Payment::latest()->take(6)->get();

        $pageTitle = 'Dashboard';

        return view('dashboard.index', compact(
            'pageTitle',
            'totalLeads',
            'totalStudents',
            'totalEmployees',
            'totalRevenue',
            'pendingFees',
            'recentLeads',
            'recentStudents',
            'recentAdmissions',
            'recentPayments'
        ));
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}