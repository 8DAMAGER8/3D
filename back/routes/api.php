<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheburekiController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OwnCors;
use Illuminate\Support\Facades\Route;

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

Route::middleware([OwnCors::class])->group(function () {


    Route::get('/get/{id}', [CheburekiController::class, 'getById']);
    Route::post('/create', [CheburekiController::class, 'create']);
    Route::post('/update/{id}', [CheburekiController::class, 'update']);
    Route::post('/delete/{id}', [CheburekiController::class, 'delete']);

    Route::get('/get.user', [UserController::class, 'getAll']);
    Route::get('/get.user/{id}', [UserController::class, 'getById']);

    Route::post('/update.user/{id}', [UserController::class, 'update']);
    Route::post('/delete.user/{id}', [UserController::class, 'delete']);


    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
        Route::post('/create.user', [UserController::class, 'create']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::post('/me', [AuthController::class, 'me']);

        Route::group(['middleware' => 'jwt.auth'],function (){
            Route::get('/get', [CheburekiController::class, 'getAll']);
        });

    });
});


