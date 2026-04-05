<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\RepportController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\ReportsHandleController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SupplierRequestHandle;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route ::get('/logout',[AuthManager::class,'logout'])->name('logout');

//Route::get('/registr', [AuthManager::class, 'showRegistrationForm'])->name('register');
//Route::get('/registration', function () {
//    return view('registration');
//})->name('registration');
Route::get('/registration', [AuthManager::class, 'showRegistrationForm'])->name('registration');
Route::post('/registration', [AuthManager::class,"registrationPost"])->name('registration.post');
Route::post('/login', [AuthManager::class,"loginPost"])->name('login.post');








Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/employee/dashboard', [RepportController::class, 'index'])->name('employee.dashboard');
    Route::get('/employee/report',[RepportController::class,'report'])->name("employee.report");
    
    Route::get('/supplier/main', [SupplierRequestHandle::class, 'index'])->name('supplierhandle.index');
    Route::post('/supplierhandle/{id}/accept', [SupplierRequestHandle::class, 'accept'])->name('supplierhandle.accept');
    Route::post('/supplierhandle/{id}/refuse', [SupplierRequestHandle::class, 'refuse'])->name('supplierhandle.refuse');



     Route::resource('categories', CategoryController::class);
    Route::resource('assets', AssetController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('maintenance', MaintenanceController::class);
    Route::resource('departments', DepartmentsController::class);
    Route::resource("suppliers",SuppliersController::class);
    // Reports
    Route::resource("reports", ReportsHandleController::class)->only(['index']);
    Route::post('/reports/{id}/accept', [ReportsHandleController::class, 'accept'])->name("reports.accept");
    Route::post('/reports/{id}/refuse', [ReportsHandleController::class, 'refuse'])->name("reports.refuse");
    //requests
    Route::resource("requests", RequestController::class)->only(['index','destroy']);
    Route::get('suppliers/{supplier}/request', [RequestController::class, 'create'])->name('requests.create');
    Route::post('suppliers/{supplier}/request', [RequestController::class, 'store'])->name('requests.store');


});
Route::get('/employees/{id}/assign', [EmployeeController::class, 'assignForm'])->name('employees.assign.form');
Route::post('/employees/{id}/assign', [EmployeeController::class, 'assignAsset'])->name('employees.assign.asset');



Route::get('/categories/{category}/assets', [CategoryController::class, 'showAssets'])
     ->name('categories.showAssets');
Route::get('/departments/{department}/employees', [DepartmentsController::class, 'showEmployees'])
     ->name('departments.showEmployees');
//Route::put('/maintenances/{maintenances}', [MaintenanceController::class, 'update'])
  //  ->name('maintenances.update');

Route::get('/employee/report/{asset}', [RepportController::class, 'create'])->name('employee.report.form');
Route::post('/employee/report/{asset}', [RepportController::class, 'store'])->name('employee.report.store');

