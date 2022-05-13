<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/offices/search/{office}', \App\Http\Controllers\Offices\SearchOfficeController::class);
    Route::get('/offices', \App\Http\Controllers\Offices\OfficesController::class);
    Route::get('/offices/actives', \App\Http\Controllers\Offices\ActivesOfficesController::class);
    Route::post('/offices', \App\Http\Controllers\Offices\StoreOfficeController::class);
    Route::put('/offices/{office}', \App\Http\Controllers\Offices\UpdateOfficeController::class);
    Route::patch('/offices/{office}', \App\Http\Controllers\Offices\StatusOfficeController::class);
});
