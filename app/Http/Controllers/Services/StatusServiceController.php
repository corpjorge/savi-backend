<?php

namespace App\Http\Controllers\Services;

use App\Models\Service;

class StatusServiceController
{
    public function __invoke(Service $service): void
    {
        $service->is_active = !$service->is_active;
        $service->save();

    }

}
