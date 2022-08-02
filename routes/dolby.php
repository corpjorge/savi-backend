<?php

use Illuminate\Support\Facades\Route;

Route::get('/dolby/token', App\Http\Controllers\dolby\TokenController::class);
Route::group(['middleware' => 'auth:sanctum'], function () {

});
