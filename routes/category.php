<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/categories/search/{category}', \App\Http\Controllers\Category\SearchCategoryController::class);
    Route::get('/categories', \App\Http\Controllers\Category\CategoriesController::class);
    Route::get('/categories/actives', \App\Http\Controllers\Category\ActivesCategoriesController::class);
    Route::post('/categories', \App\Http\Controllers\Category\StoreCategoryController::class);
    Route::put('/categories/{category}', \App\Http\Controllers\Category\UpdateCategoryController::class);
    Route::patch('/categories/{category}', \App\Http\Controllers\Category\StatusCategoryController::class);
});
