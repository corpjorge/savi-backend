<?php

namespace App\Http\Controllers\Category;

class ActivesCategoriesController
{
    public function __invoke()
    {
        return \App\Models\Category::where('is_active', true)->get();
    }

}
