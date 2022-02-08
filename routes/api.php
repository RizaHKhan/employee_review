<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\ManagerController;
use App\Http\Controllers\API\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [RegisterController::class, 'login']);

Route::middleware('auth:sanctum', 'can:is_admin')->prefix('admin')->group(function (): void {
    Route::get('/managers', [AdminController::class, 'getManagers']);
    Route::post('/manager', [AdminController::class, 'addManager']);
    Route::delete('/manager/{id}', [AdminController::class, 'deleteManager']);
    Route::post('/department', [AdminController::class, 'addDepartment']);
});

Route::middleware('auth:sanctum', 'can:is_manager')->prefix('manager')->group(function (): void {
    Route::get('/employees', [ManagerController::class, 'getEmployees']);
    Route::post('/employee', [ManagerController::class, 'addEmployee']);
    Route::delete('/employee/{id}', [ManagerController::class, 'deleteEmployee']);
});

Route::middleware('auth:sanctum', 'can:is_employee')->group(function (): void {
    Route::post('/employee', [EmployeeController::class, 'addEmployee']);
    Route::delete('/employee/{id}', [EmployeeController::class, 'deleteEmployee']);
});
