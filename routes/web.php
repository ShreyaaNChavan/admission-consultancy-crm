<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Lead\LeadController;
use App\Http\Controllers\Master\CourseController;
use App\Http\Controllers\Master\LeadSourceController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\Admission\AdmissionController;
use App\Http\Controllers\Master\BatchController;
use App\Http\Controllers\Master\FeeStructureController;
use App\Http\Controllers\Finance\PaymentController;
use App\Http\Controllers\Finance\ReceiptController;
use App\Http\Controllers\Settings\DesignationController;
use App\Http\Controllers\HR\EmployeeController;
use App\Http\Controllers\Academic\AttendanceController;
use App\Http\Controllers\Academic\StudentController;
use App\Http\Controllers\Academic\FacultyController;
use App\Http\Controllers\HR\EmployeeAttendanceController;
use App\Http\Controllers\HR\LeaveRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayrollController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Employee\EmployeeLeaveController;
use App\Http\Controllers\Employee\EmployeePayrollController;
use App\Http\Controllers\Employee\EmployeeProfileController;

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [LoginController::class, 'dashboard']);

    /*
    |--------------------------------------------------------------------------
    | Lead Module
    |--------------------------------------------------------------------------
    */

    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');

    Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create');

    Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

    /*
|--------------------------------------------------------------------------
| Course Module
|--------------------------------------------------------------------------
*/

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

    Route::get('/lead-sources', [LeadSourceController::class, 'index'])->name('lead-sources.index');

    Route::get('/lead-sources/create', [LeadSourceController::class, 'create'])->name('lead-sources.create');

    Route::post('/lead-sources', [LeadSourceController::class, 'store'])->name('lead-sources.store');

});


Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');

Route::post('/leads/{lead}/assign', [LeadController::class, 'assignCounselor'])->name('leads.assign');


Route::post('/leads/{lead}/followups', [FollowupController::class, 'store'])
    ->name('followups.store');

Route::get('/admissions', [AdmissionController::class, 'index'])
    ->name('admissions.index');

Route::post('/leads/{lead}/convert', [AdmissionController::class, 'convert'])
    ->name('admissions.convert');

Route::get('/admissions/{student}', [AdmissionController::class, 'show'])
    ->name('admissions.show');



Route::resource('batches', BatchController::class);
Route::resource('fee-structures', FeeStructureController::class);

Route::get(
    '/admissions/{student}/edit',
    [AdmissionController::class, 'edit']
)
    ->name('admissions.edit');

Route::put('/admissions/{student}', [AdmissionController::class, 'update'])->name('admissions.update');

Route::get('/payments/{invoice}', [PaymentController::class, 'index'])
    ->name('payments.index');

Route::post('/payments/{invoice}', [PaymentController::class, 'store'])
    ->name('payments.store');

Route::get('/receipt/{payment}', [ReceiptController::class, 'show'])->name('receipt.show');


Route::get('/payments', [PaymentController::class, 'all'])
    ->name('payments.all');

Route::resource('faculties', FacultyController::class);

Route::resource('designations', DesignationController::class);


Route::resource('employees', EmployeeController::class);

Route::get('/attendance', [AttendanceController::class, 'index'])
    ->name('attendance.index');

Route::get('/attendance/{batch}/mark', [AttendanceController::class, 'mark'])
    ->name('attendance.mark');

Route::post('/attendance/{batch}', [AttendanceController::class, 'store'])
    ->name('attendance.store');



Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');

Route::get('/students/{student}', [StudentController::class, 'show'])
    ->name('students.show');


Route::get(
    '/attendance/{batch}/history',
    [AttendanceController::class, 'history']
)->name('attendance.history');



Route::resource('employee-attendances', EmployeeAttendanceController::class);
Route::resource('leave-requests', LeaveRequestController::class);
Route::resource('users', UserController::class);
Route::resource('payrolls', PayrollController::class);

Route::get('/payrolls/{payroll}/pdf', [PayrollController::class, 'downloadPdf'])
    ->name('payrolls.pdf');


Route::get('/employee/leave', [EmployeeLeaveController::class, 'index'])
    ->name('employee.leave.index');

Route::get('/employee/leave/create', [EmployeeLeaveController::class, 'create'])
    ->name('employee.leave.create');

Route::post('/employee/leave', [EmployeeLeaveController::class, 'store'])
    ->name('employee.leave.store');

Route::delete('/employee/leave/{leaveRequest}', [EmployeeLeaveController::class, 'destroy'])
    ->name('employee.leave.destroy');

Route::get('/employee/payroll', [EmployeePayrollController::class, 'index'])
    ->name('employee.payroll.index');

Route::get('/employee/payroll/{payroll}', [EmployeePayrollController::class, 'show'])
    ->name('employee.payroll.show');

Route::get('/employee/payroll/{payroll}/pdf', [EmployeePayrollController::class, 'downloadPdf'])
    ->name('employee.payroll.pdf');

Route::get('/employee/profile', [EmployeeProfileController::class, 'index'])
    ->name('employee.profile');