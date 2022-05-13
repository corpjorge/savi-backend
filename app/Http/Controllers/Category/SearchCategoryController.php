<?php

namespace App\Http\Controllers\Category;

class SearchCategoryController
{
    public function __invoke($category = null)
    {
        return \App\Models\Category::where('name', 'like', '%' . $category . '%')->get();
    }
}
