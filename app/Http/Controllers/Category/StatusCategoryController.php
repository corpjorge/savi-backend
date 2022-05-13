<?php

namespace App\Http\Controllers\Category;

class StatusCategoryController
{
    public function __invoke(\App\Models\Category $category): void
    {
        $category->is_active = !$category->is_active;
        $category->save();
    }
}
