<?php

namespace App\Http\Controllers\Services;

class ServicesController
{
    public function __invoke()
    {
        return \App\Models\Service::all();
    }

}
