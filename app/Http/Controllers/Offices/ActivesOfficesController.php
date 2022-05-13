<?php

namespace App\Http\Controllers\Offices;

class ActivesOfficesController
{
    public function __invoke(\App\Models\Office $office)
    {
        return $office->where('is_active', true)->get();
    }

}
