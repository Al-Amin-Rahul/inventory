<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\SuplierController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\SalaryController;

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\Auth',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::apiResource('employee', EmployeeController::class);
Route::apiResource('suplier', SuplierController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('expense', ExpenseController::class);

Route::Post('store-salary', [SalaryController::class, 'storeSalary']);
Route::Get('all-salary', [SalaryController::class, 'allSalary']);
Route::Get('view-salary/{id}', [SalaryController::class, 'viewSalary']);
Route::Put('update-stock/{id}', [SalaryController::class, 'updateStock']);
