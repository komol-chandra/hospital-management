<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorDepartmentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewAppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [FrontendController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/admin', [DashboardController::class, 'index']);

Route::prefix('frontend')->group(function () {
    Route::get('/index', [FrontendController::class, 'index']);
    Route::get('/appointment', [FrontendController::class, 'appointment']);
    Route::get('/doctors', [FrontendController::class, 'getActiveDoctors']);
    Route::get('/doctorId/{id}', [FrontendController::class, 'doctorId']);
    Route::resource('/new_appointments', NewAppointmentController::class);
});

Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::resource('/user-profile', ProfileController::class);
        Route::resource('/department', DoctorDepartmentController::class);
        Route::get('/department/status/{id}', [DoctorDepartmentController::class, 'status']);
        Route::resource('/doctor', DoctorController::class);
        Route::get('/doctor/status/{id}', [DoctorController::class, 'status']);
        Route::resource('/patient', PatientController::class);
        Route::get('/patient/status/{id}', [PatientController::class, 'status']);
        Route::resource('/schedule', ScheduleController::class);
        Route::get('/schedule/status/{id}', [ScheduleController::class, 'status']);
        Route::resource('/appointment', AppointmentController::class);
        Route::get('/appointment/doctorId/{id}', [AppointmentController::class, 'doctorId']);
    });
});
