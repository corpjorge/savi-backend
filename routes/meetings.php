<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/meetings/adviser/{adviser}', App\Http\Controllers\Meeting\AdviserMeetingsController::class);
    Route::get('/meetings/user/{user}', App\Http\Controllers\Meeting\UserMeetingsController::class);
    Route::post('/meetings', App\Http\Controllers\Meeting\StoreMeetingController::class);
});
