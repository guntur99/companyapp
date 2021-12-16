<?php

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

Route::get('/', function () {
    return view('welcome');
})->middleware(['admin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Companies
Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('index.company')
    ->middleware(['admin']);
Route::post('/companies/create-new-company', [App\Http\Controllers\CompanyController::class, 'create'])->name('create.company')
    ->middleware(['admin']);
Route::get('/companies/company-list', [App\Http\Controllers\CompanyController::class, 'list'])->name('list.company')
    ->middleware(['admin']);
Route::get('/companies/company-list-datatable', [App\Http\Controllers\CompanyController::class, 'companyListDatatable'])->name('list.datatable.company')
    ->middleware(['admin']);

// Employees
Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('index.employee')
    ->middleware(['admin']);
Route::post('/employees/add-new-employee', [App\Http\Controllers\EmployeeController::class, 'create'])->name('create.employee')
    ->middleware(['admin']);
Route::get('/employees/employee-list', [App\Http\Controllers\EmployeeController::class, 'list'])->name('list.employee')
    ->middleware(['admin']);
Route::get('/employees/employee-list-datatable', [App\Http\Controllers\EmployeeController::class, 'employeeListDatatable'])->name('list.datatable.employee')
    ->middleware(['admin']);
Route::post('/employees/update-employee', [App\Http\Controllers\EmployeeController::class, 'update'])->name('update.employee')
    ->middleware(['admin']);
Route::post('/employees/delete-employee', [App\Http\Controllers\EmployeeController::class, 'delete'])->name('delete.employee')
    ->middleware(['admin']);

require __DIR__.'/auth.php';
