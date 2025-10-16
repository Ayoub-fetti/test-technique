<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
 
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('auth:api');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'tasks'
],function($router) {
    Route::get('/', [TaskController::class, 'index'])->middleware('auth:api');
    Route::post('/', [TaskController::class, 'store'])->middleware('auth:api');
    Route::put('/{id}', [TaskController::class, 'update'])->middleware('auth:api');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->middleware('auth:api');
    Route::post('/status/{id}', [TaskController::class, 'changeStatus'])->middleware('auth:api');

});