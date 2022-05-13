<?php

namespace App\Http\Controllers\Offices;

use App\Models\Office;

class StoreOfficeController
{
    public function __invoke(\Illuminate\Http\Request $request, Office $office): void
    {
        $request->validate(['name' => 'required']);
        $office->create($request->all());
    }

}
