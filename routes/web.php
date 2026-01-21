<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('companies', CompanyController::class);

    Route::get('companies-list', [CompanyController::class, 'list'])
        ->name('companies.list');

    Route::resource('employees', EmployeeController::class);
    Route::get('employees-list', [EmployeeController::class, 'list'])
        ->name('employees.list');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
