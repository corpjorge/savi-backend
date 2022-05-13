<?php

namespace App\Http\Controllers\Services;

class ActivesServicesController
{
    public function __invoke()
    {
        return \App\Models\Service::where('is_active', true)->get();
    }

}
