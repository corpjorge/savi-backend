<?php

Illuminate\Support\Facades\Route::get('*', function () {
    return abort(404);
});
