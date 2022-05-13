<?php

namespace App\Http\Controllers\Services;

use App\Models\Service;

class StoreServiceController
{
    public function __invoke(\Illuminate\Http\Request $request, Service $service): void
    {
        $request->validate(['name' => 'required', 'category_id' => 'required|exists:categories,id']);
        $service->create($request->all());
    }

}
