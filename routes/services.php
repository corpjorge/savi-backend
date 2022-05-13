<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('services/search/{service}', \App\Http\Controllers\Services\SearchServiceController::class);
    Route::get('services',\App\Http\Controllers\Services\ServicesController::class);
    Route::get('services/actives',\App\Http\Controllers\Services\ActivesServicesController::class);
    Route::post('services', \App\Http\Controllers\Services\StoreServiceController::class);
    Route::put('services/{service}', \App\Http\Controllers\Services\UpdateServiceController::class);
    Route::patch('services/{service}', \App\Http\Controllers\Services\StatusServiceController::class);
});
