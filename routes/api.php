<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', App\Http\Controllers\Authentication\loginController::class);

require_once 'administrators.php';
require_once 'users.php';

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', App\Http\Controllers\Authentication\LogoutController::class);
    Route::get('/user', App\Http\Controllers\Authentication\AuthenticatedUserController::class);
});
