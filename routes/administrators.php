<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/admins/search/{admins?}', \App\Http\Controllers\Administrators\SearchAdminController::class);
    Route::get('/admins', \App\Http\Controllers\Administrators\AdministratorsController::class);
    Route::post('/admins', \App\Http\Controllers\Administrators\StoreAdminController::class);
    Route::put('/admins/{admin}', \App\Http\Controllers\Administrators\UpdateAdminController::class);
    Route::delete('/admins/{id}', \App\Http\Controllers\Administrators\DeleteAdminController::class);
    Route::patch('/admins/{id}', \App\Http\Controllers\Administrators\RestoreAdminController::class);
});
