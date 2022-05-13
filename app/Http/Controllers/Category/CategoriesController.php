<?php

namespace App\Http\Controllers\Category;

class CategoriesController
{
    public function __invoke()
    {
        return \App\Models\Category::all()->load('services');
    }

}
