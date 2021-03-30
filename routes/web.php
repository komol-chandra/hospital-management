<?php

use App\Http\Controllers\Auth\User\HomeController;
use App\Http\Controllers\Auth\User\RegisterController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\AccountInvoiceController;
use App\Http\Controllers\Backend\AppointmentController as BackendAppointmentController;
use App\Http\Controllers\Backend\AppointmentReportController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\DoctorDepartmentController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\EmployeeRollController;
use App\Http\Controllers\Backend\ExpenseBillController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\GenericController;
use App\Http\Controllers\Backend\IncomeReportController;
use App\Http\Controllers\Backend\MailController;
use App\Http\Controllers\Backend\ManufacturerController;
use App\Http\Controllers\Backend\MedicineController;
use App\Http\Controllers\Backend\MedicineTypeController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\PatientController;
use App\Http\Controllers\Backend\PatientTestController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Backend\PrescriptionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ProfitLossReportController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\RoleHasPermissionController;
use App\Http\Controllers\Backend\SaleController;
use App\Http\Controllers\Backend\ScheduleController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\Backend\TestBillController;
use App\Http\Controllers\Backend\TestController;
use App\Http\Controllers\Backend\UnitTypeController;
use App\Http\Controllers\Backend\UserAccessController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\Frontend\DoctorViewController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\Frontend\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/admin', [DashboardController::class, 'index']);

Route::prefix('admin/rbac')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::resource('/role', RoleController::class);
        Route::get('/roleList', [RoleController::class, 'roleList']);
        Route::resource('/role_permission', RoleHasPermissionController::class);
        Route::resource('/user', UserController::class);
        Route::get('/userList', [UserController::class, 'userList']);
        Route::resource('/user_access', UserAccessController::class);
        Route::get('/userAccessList', [UserAccessController::class, 'userAccessList']);
    });
});

Route::prefix('user')->group(function () {
    Route::resource('/register', RegisterController::class);
    Route::get('/login-view', [RegisterController::class, 'loginView']);
    Route::post('/login', [RegisterController::class, 'login']);
    Route::get('/logout', [RegisterController::class, 'logout']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::resource('/view-profile', FrontendUserController::class);
    Route::resource('/view-dashboard', UserDashboardController::class);
    Route::get('/view-dashboard', [FrontendUserController::class, 'create']);
    Route::get('/prescription-invoice', [FrontendUserController::class, 'prescriptionView']);

});

Route::prefix('frontend')->group(function () {
    Route::get('/index', [FrontendController::class, 'index']);
    Route::resource('/doctor-view', DoctorViewController::class);
    Route::resource('/appointment', AppointmentController::class);
    Route::get('/getDoctorId/{id}', [AppointmentController::class, 'getDoctorId']);

});

Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        //dashboard
        Route::get('/percentage', [DashboardController::class, 'percentage']);
        Route::get('/counters', [DashboardController::class, 'counters']);
        Route::get('/top-doctor', [DashboardController::class, 'topDoctors']);
        Route::get('/notices', [DashboardController::class, 'notices']);
        // admin panel profile
        Route::resource('/user-profile', ProfileController::class);
        Route::get('/password', [ProfileController::class, 'password']);
        Route::get('/matchPassword', [ProfileController::class, 'matchPassword']);
        Route::post('/changePassword', [ProfileController::class, 'changePassword']);
        //admin panel department
        Route::resource('/department', DoctorDepartmentController::class);
        Route::get('/department/status/{id}', [DoctorDepartmentController::class, 'status']);
        Route::get('/departmentExcel', [DoctorDepartmentController::class, 'downloadExcel']);
        Route::get('/departmentPdf', [DoctorDepartmentController::class, 'downloadPdf']);
        Route::get('/downloadCVS', [DoctorDepartmentController::class, 'downloadCVS']);
        //admin panel doctor
        Route::resource('/doctor', DoctorController::class);
        Route::get('/doctor/status/{id}', [DoctorController::class, 'status']);
        Route::get('/doctorExcel', [DoctorController::class, 'doctorExcel']);
        Route::get('/doctorPdf', [DoctorController::class, 'doctorPdf']);
        //admin panel patient
        Route::resource('/patient', PatientController::class);
        Route::get('/patient/status/{id}', [PatientController::class, 'status']);
        Route::get('/patientList', [PatientController::class, 'patientList']);
        Route::get('/patientExcel', [PatientController::class, 'patientExcel']);
        Route::get('/patientCsv', [PatientController::class, 'patientCsv']);
        Route::get('/patientPdf', [PatientController::class, 'patientPdf']);
        Route::post('/patientImport', [PatientController::class, 'patientImport']);
        //admin panel schedule
        Route::resource('/schedule', ScheduleController::class);
        Route::get('/schedule/status/{id}', [ScheduleController::class, 'status']);
        Route::get('/scheduleList', [ScheduleController::class, 'scheduleList']);
        //report
        Route::resource('/income-report', IncomeReportController::class);
        Route::resource('/appointment-report', AppointmentReportController::class);
        Route::resource('/expense', ExpenseController::class);
        Route::resource('/expense-bill', ExpenseBillController::class);
        Route::get('/expense-report', [ExpenseBillController::class, 'expense']);
        Route::resource('/profit-loss-report', ProfitLossReportController::class);
        //frontend appointments
        Route::resource('/online-appointment', BackendAppointmentController::class);
        Route::post('/online-appointment/search', [BackendAppointmentController::class, 'search']);
        Route::get('/appointmentList', [BackendAppointmentController::class, 'appointmentList']);
        Route::get('/online-appointment/status/{id}', [BackendAppointmentController::class, 'status']);
        Route::get('/online-appointment/payment-status/{id}', [BackendAppointmentController::class, 'paymentStatus']);
        //admin panel test type
        Route::resource('/test', TestController::class);
        Route::get('/test/status/{id}', [TestController::class, 'status']);
        Route::resource('/test-bill', TestBillController::class);
        Route::get('/matchPatientBill', [TestBillController::class, 'matchPatient']);
        //admin patient test
        Route::resource('/patient-test', PatientTestController::class);
        Route::get('/patient-test/status/{id}', [PatientTestController::class, 'status']);
        //admin medicine -type
        Route::resource('/medicine-type', MedicineTypeController::class);
        Route::get('/medicine-type/status/{id}', [MedicineTypeController::class, 'status']);
        //admin Generic
        Route::resource('/generic', GenericController::class);
        Route::get('/generic/status/{id}', [GenericController::class, 'status']);
        //unit type
        Route::resource('/unit-type', UnitTypeController::class);

        //admin Medicine
        Route::resource('/medicine', MedicineController::class);
        Route::get('/medicine/status/{id}', [MedicineController::class, 'status']);
        Route::get('/medicine-excel', [MedicineController::class, 'exportExcel']);
        Route::get('/medicine-csv', [MedicineController::class, 'exportCSV']);
        Route::get('/medicine-pdf', [MedicineController::class, 'exportPDF']);
        Route::post('/medicine-import', [MedicineController::class, 'import']);
        //admin Manufacturer
        Route::resource('/manufacturer', ManufacturerController::class);
        Route::get('/manufacturer/status/{id}', [ManufacturerController::class, 'status']);
        //sock
        Route::resource('/stock', StockController::class);
        Route::get('/stockSearch', [StockController::class, 'stockSearch']);
        //
        Route::resource('/customer', CustomerController::class);
        //sale
        Route::resource('/sale', SaleController::class);
        Route::get('/saleSearch', [SaleController::class, 'saleSearch']);
        Route::get('/getBatch/{id}', [SaleController::class, 'getBatch']);

        //admin Prescription
        Route::resource('/prescription', PrescriptionController::class);
        Route::get('/prescription/status/{id}', [PrescriptionController::class, 'status']);

        Route::resource('/employee-roll', EmployeeRollController::class);
        Route::get('/employee-roll/status/{id}', [EmployeeRollController::class, 'status']);

        Route::resource('/employee', EmployeeController::class);
        Route::get('/employee/status/{id}', [EmployeeController::class, 'status']);

        Route::resource('/setting', SettingController::class);

        Route::resource('/account', AccountController::class);
        Route::get('/account/status/{id}', [AccountController::class, 'status']);

        Route::resource('/payment', PaymentController::class);
        Route::get('/payment/status/{id}', [PaymentController::class, 'status']);

        Route::resource('/account-invoice', AccountInvoiceController::class);
        Route::get('/account-invoice/status/{id}', [AccountInvoiceController::class, 'status']);

        Route::get('/matchPatient', [AccountInvoiceController::class, 'matchPatient']);

        Route::resource('/service', ServiceController::class);
        Route::get('/service/status/{id}', [ServiceController::class, 'status']);

        Route::resource('/payment-method', PaymentMethodController::class);
        Route::get('/payment-method/status/{id}', [PaymentMethodController::class, 'status']);

        Route::resource('/notice', NoticeController::class);
        Route::get('/notice/status/{id}', [NoticeController::class, 'status']);

        Route::resource('/mail', MailController::class);

    });
});
