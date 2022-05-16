<?php

namespace App\Http\Controllers\Application;

use App\Models\Application;

class ApplicationAdminController
{
    public function __invoke()
    {
        return Application::where('admin_id', auth()->id())->get();
    }

}
