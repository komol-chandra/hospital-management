<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorDepartmentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicineTypeController;
use App\Http\Controllers\NewAppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientTestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TestController;
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
    //view frontend
    Route::get('/index', [FrontendController::class, 'index']);
    //view appointment form
    Route::get('/appointment', [FrontendController::class, 'appointment']);
    //view doctors
    Route::get('/doctors', [FrontendController::class, 'getActiveDoctors']);
    //to get doctor id under departments
    Route::get('/doctorId/{id}', [FrontendController::class, 'doctorId']);
    //to get doctor id for old patients
    Route::get('/doctorId2/{id}', [FrontendController::class, 'doctorId2']);
    //to post the new appointment form
    Route::resource('/new_appointments', NewAppointmentController::class);
    Route::post('/old_appointments', [NewAppointmentController::class, 'oldAppointmentStore']);
});

Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        // admin panel profile
        Route::resource('/user-profile', ProfileController::class);
        //admin panel department
        Route::resource('/department', DoctorDepartmentController::class);
        Route::get('/department/status/{id}', [DoctorDepartmentController::class, 'status']);
        //admin panel doctor
        Route::resource('/doctor', DoctorController::class);
        Route::get('/doctor/status/{id}', [DoctorController::class, 'status']);
        //admin panel patient
        Route::resource('/patient', PatientController::class);
        Route::get('/patient/status/{id}', [PatientController::class, 'status']);
        //admin panel schedule
        Route::resource('/schedule', ScheduleController::class);
        Route::get('/schedule/status/{id}', [ScheduleController::class, 'status']);
        //admin panel appointment
        Route::resource('/appointment', AppointmentController::class);
        Route::get('/appointment/doctorId/{id}', [AppointmentController::class, 'doctorId']);
        //frontend appointments
        Route::resource('/new_appointments', NewAppointmentController::class);
        //admin panel test type
        Route::resource('/test', TestController::class);
        Route::get('/test/status/{id}', [TestController::class, 'status']);
        //admin patient test
        Route::resource('/patient-test', PatientTestController::class);
        Route::get('/patient-test/status/{id}', [PatientTestController::class, 'status']);
        //admin medicine -type
        Route::resource('/medicine-type', MedicineTypeController::class);
        Route::get('/medicine-type/status/{id}', [MedicineTypeController::class, 'status']);
        //admin Generic
        Route::resource('/generic', GenericController::class);
        Route::get('/generic/status/{id}', [GenericController::class, 'status']);
        //admin Medicine
        Route::resource('/medicine', MedicineController::class);
        //admin Manufacturer
        Route::resource('/manufacturer', ManufacturerController::class);
        Route::get('/manufacturer/status/{id}', [ManufacturerController::class, 'status']);

    });
});
