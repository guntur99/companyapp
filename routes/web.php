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

Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('index.company')
    ->middleware(['admin']);
Route::post('/companies/create-new-company', [App\Http\Controllers\CompanyController::class, 'create'])->name('create.company')
    ->middleware(['admin']);
Route::post('/companies/company-list', [App\Http\Controllers\CompanyController::class, 'list'])->name('list.company')
    ->middleware(['admin']);


require __DIR__.'/auth.php';
