<?php

namespace App\Http\Controllers\Offices;


class OfficesController
{
    public function __invoke()
    {
        return \App\Models\Office::all();
    }

}
