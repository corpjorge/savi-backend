<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', App\Http\Controllers\Authentication\LoginController::class);

require_once 'administrators.php';
require_once 'users.php';
require_once 'services.php';
require_once 'meetings.php';
require_once 'application.php';
require_once 'dolby.php';

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', App\Http\Controllers\Authentication\LogoutController::class);
    Route::get('/user', App\Http\Controllers\Authentication\AuthenticatedUserController::class)->middleware('verified');
    Route::post('/email/verification-notification', App\Http\Controllers\Authentication\VerificationEmailController::class)->middleware('throttle:6,1')->name('verification.send');

    Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
        $request->fulfill();
    })->middleware('signed')->name('verification.verify');
});
