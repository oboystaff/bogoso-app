<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\ApplicationController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('category', App\Http\Controllers\CategoryController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

Route::get('/application', [ApplicationController::class, 'index']);
Route::get('/application/show/{application}', [ApplicationController::class, 'show']);
Route::post('/application', [ApplicationController::class, 'store']);
Route::post('/application/update/{application}', [ApplicationController::class, 'update']);
Route::post('/application/delete/{application}', [ApplicationController::class, 'destroy']);
Route::get('/application/download/{application}', [ApplicationController::class, 'download']);

Route::get('/user', [RegistrationController::class, 'index']);
Route::get('/user/show/{user}', [RegistrationController::class, 'show']);
Route::post('/user', [RegistrationController::class, 'store']);
Route::post('/user/update/{user}', [RegistrationController::class, 'update']);
Route::post('/user/delete/{user}', [RegistrationController::class, 'destroy']);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard/data', [DashboardController::class, 'dashboardData']);
