<?php

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use App\Models\User;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AuthController;
use App\Events\UserCreated;

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
Route::group(['middleware' => ['request.log']], function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::prefix('v1')->group(function () {

        Route::get('/login', function () {
            abort(401);
        })->name('login');

        Route::group(['middleware' => ['api_key', 'auth:sanctum']], function () {

            Route::get('leave-request', [LeaveController::class, 'index']);
            Route::get('my-leave', [LeaveController::class, 'leave']);
            Route::post('request-leave', [LeaveController::class, 'create']);
            Route::get('leave/{id}', [LeaveController::class, 'show']);
            Route::put('leave/{id}', [LeaveController::class, 'update']);
        });

        Route::post('/login', [AuthController::class, 'login']);

        Route::get('/mail', function () {
            /*Helper::EmailSend([
                'name' => 'Sakda',
                'email' => 'welovelink@gmail.com',
                'subject' => 'Test',
                'message' => '<b>Message</b>',
            ]);*/
            event(new UserCreated('abc@gmail.com'));
        });
    });
});

