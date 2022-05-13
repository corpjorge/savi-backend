<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/users/search/{users?}', \App\Http\Controllers\Administrators\SearchAdminController::class);
    Route::get('/users', \App\Http\Controllers\Users\UsersController::class);
    Route::post('/users', \App\Http\Controllers\Administrators\StoreAdminController::class);
    Route::put('/users/{admin}', \App\Http\Controllers\Administrators\UpdateAdminController::class);
    Route::delete('/users/{id}', \App\Http\Controllers\Administrators\DeleteAdminController::class);
    Route::patch('/users/{id}', \App\Http\Controllers\Administrators\RestoreAdminController::class);
});
