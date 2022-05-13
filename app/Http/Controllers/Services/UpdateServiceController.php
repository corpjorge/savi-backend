<?php

namespace App\Http\Controllers\Services;

use App\Models\Service;

class UpdateServiceController
{
    public function __invoke(\Illuminate\Http\Request $request, Service $service)
    {
        $request->validate(['name' => 'required', 'category_id' => 'required|exists:categories,id']);
        $service->update($request->all());
    }

}
