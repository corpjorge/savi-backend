<?php

namespace App\Http\Controllers\Application;

use App\Models\Application;

class UpdateApplicationController
{
    public function __invoke(\Illuminate\Http\Request $request, Application $application)
    {
        $request->validate(['state' => 'required']);
        $application->update($request->all());
    }

}
