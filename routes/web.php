<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Lead\LeadController;
use App\Http\Controllers\Master\CourseController;
use App\Http\Controllers\Master\LeadSourceController;

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