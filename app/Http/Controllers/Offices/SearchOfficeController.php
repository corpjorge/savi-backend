<?php

namespace App\Http\Controllers\Offices;

class SearchOfficeController
{
    public function __invoke($office = null)
    {
        return \App\Models\Office::where('name', 'like', '%' . $office . '%')->get();
    }

}
