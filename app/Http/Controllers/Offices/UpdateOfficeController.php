<?php

namespace App\Http\Controllers\Offices;

use App\Models\Office;

class UpdateOfficeController
{
    public function __invoke(\Illuminate\Http\Request $request, Office $office)
    {
        $request->validate(['name' => 'required']);
        $office->update($request->all());
    }

}
