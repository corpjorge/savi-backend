<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/users/search/{users?}', App\Http\Controllers\Users\SearchUserController::class);
    Route::get('/users', App\Http\Controllers\Users\UsersController::class);
    Route::post('/users', App\Http\Controllers\Users\StoreUserController::class);
    Route::put('/users/{user}', App\Http\Controllers\Users\UpdateUserController::class);
    Route::delete('/users/{id}', App\Http\Controllers\Users\DeleteUserController::class);
    Route::patch('/users/{id}', App\Http\Controllers\Users\RestoreUserController::class);
});
