<?php

namespace App\Http\Controllers\Application;

use App\Models\Application;

class ApplicationUserController
{
    public function __invoke()
    {
        return Application::where('user_id', auth()->id())->get();
    }

}
