<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/meetings/adviser', App\Http\Controllers\Meeting\AdviserMeetingsController::class);
    Route::get('/meetings/user', App\Http\Controllers\Meeting\UserMeetingsController::class);
    Route::get('/meetings/months/{months}', App\Http\Controllers\Meeting\MeetingsMonths::class);
    Route::get('/meetings/day/{day}', App\Http\Controllers\Meeting\MeetingsDay::class);
    Route::post('/meetings', App\Http\Controllers\Meeting\StoreMeetingController::class);
    Route::post('/meetings/{meetings}/email', App\Http\Controllers\Meeting\SendMeetingEmailController::class);
});
