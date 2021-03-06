<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BranchOfficeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PDFEmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UsersController;

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
    return redirect('/home');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('generateSummary/{id}', [PDFController::class, 'generateSummary']);

    Route::resource('api/user', UsersController::class);

    Route::resource('api/branch_office', BranchOfficeController::class);
    Route::resource('api/employee', EmployeeController::class);

    Route::get('generateSummaryEmployee/{id}', [PDFEmployeeController::class, 'generateSummaryEmployee']);

    Route::group(['middleware' => ['role:Administrator']], function () {
        Route::get('/users', function () {
            return view('user.index');
        });

        Route::get('/employees', function () {
            return view('employee.index');
        });

        Route::get('/reports', function () {
            return view('reports');
        });

        Route::get('/summaryEmployee', function () {
            return view('summaryEmployee.index');
        });
    });
});


Auth::routes(['register'=>false, 'reset'=>false]);
