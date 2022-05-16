<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/application/user', App\Http\Controllers\Application\ApplicationUserController::class);
    Route::get('/application/admin', App\Http\Controllers\Application\ApplicationAdminController::class);
    Route::post('/application', App\Http\Controllers\Application\StoreApplicationController::class);
    Route::get('/application/{application}/documents', App\Http\Controllers\Application\Documents\ApplicationDocumentsAdminController::class);
    Route::get('/application/{application}/documents/user', App\Http\Controllers\Application\Documents\ApplicationDocumentsUserController::class);
    Route::put('/application/{application}', App\Http\Controllers\Application\UpdateApplicationController::class);
    Route::post('/application/{application}/documents', App\Http\Controllers\Application\Documents\UploadDocumentsApplicationAdminController::class);
    Route::post('/application/{application}/documents/user', App\Http\Controllers\Application\Documents\UploadDocumentsApplicationUserController::class);
    Route::delete('/application/{application}/documents/{document}', App\Http\Controllers\Application\Documents\DeleteApplicationDocumentController::class);
});

