<?php

namespace App\Http\Controllers\Offices;

class StatusOfficeController
{
    public function __invoke(\App\Models\Office $office): void
    {
        $office->is_active = ! $office->is_active;
        $office->save();
    }

}
