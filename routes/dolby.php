<?php

use Illuminate\Support\Facades\Route;

Route::get('/dolby/token', App\Http\Controllers\Dolby\TokenController::class);
Route::group(['middleware' => 'auth:sanctum'], function () {

});
