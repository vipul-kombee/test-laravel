<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ExportController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])
    ->middleware(['throttle', 'api'])
    ->name('passport.token');

Route::post('/user_register', [AuthController::class, 'userRegister']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('/roles', RoleController::class);
Route::get('/states', [LocationController::class, 'getStates']);
Route::get('/cities', [LocationController::class, 'getCities']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/export/csv', [ExportController::class, 'exportCSV']);
    Route::get('/export/excel', [ExportController::class, 'exportExcel']);
    Route::get('/export/pdf', [ExportController::class, 'exportPDF']);
    Route::resource('/users', UserController::class);
});