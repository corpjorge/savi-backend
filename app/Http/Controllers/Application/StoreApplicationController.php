<?php

namespace App\Http\Controllers\Application;

use App\Models\Application;

class StoreApplicationController
{
    public function __invoke(\Illuminate\Http\Request $request, Application $application)
    {
        $request->validate(['service_id' => 'required|exists:services,id', 'user_id' => 'required|exists:users,id',]);
        $application->fill($request->all());
        $application->admin_id = auth()->id();
        $application->state = 'active';
        $application->save();
        return $application->id;
    }

}
