<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v2'], function () {
    Route::post('/login', [AuthenticationController::class, 'login']);
});

Route::group(['prefix' => 'v2', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/me', [UserController::class, 'loggedInfo']);
    Route::get('/users', [UserController::class, 'userList'])->middleware('permission:users.view');
    Route::post('/users/create', [UserController::class, 'userCreate'])->middleware('permission:users.create');
});
