<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ApproveController;
use App\Helpers\Helper;
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

Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'myauth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/leave', [LeaveController::class, 'index']);
    Route::get('/leave/create', [LeaveController::class, 'create']);
    Route::get('/approve', [ApproveController::class, 'index']);

    Route::prefix('service')->group(function () {
        Route::post('request-leave', [LeaveController::class, 'store']);
        Route::post('/approve-leave', [ApproveController::class, 'store']);
    });
});


