<?php

use App\Http\Controllers\API\RegisterController;
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

Route::middleware('auth:sanctum', function () {
    Route::group(
        [
            'prefix'     => 'admin',
            'middleware' => 'is_admin'
        ],
        function (): void {
            Route::post('/manager', [AdminController::class, 'addManager']);
            Route::delete('/manager/{id}', [AdminController::class, 'deleteManager']);
            Route::post('/department', [AdminController::class, 'addDepartment']);
        }
    );
});
