<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;

class StoreCategoryController
{
    public function __invoke(\Illuminate\Http\Request $request, Category $category): void
    {
        $request->validate(['name' => 'required']);
        $category->create($request->all());
    }
}
