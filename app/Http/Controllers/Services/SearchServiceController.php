<?php

namespace App\Http\Controllers\Services;

class SearchServiceController
{
    public function __invoke($service = null)
    {
        return \App\Models\Service::where('name', 'LIKE', '%' . $service . '%')->get();
    }

}
