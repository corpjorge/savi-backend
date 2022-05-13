<?php

namespace App\Http\Controllers\Category;

class UpdateCategoryController
{
    public function __invoke(\Illuminate\Http\Request $request, \App\Models\Category $category): void
    {
        $request->validate(['name' => 'required']);
        $category->update($request->all());
    }
}
