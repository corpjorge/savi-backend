<?php

namespace App\Http\Controllers\Authentication;

class AuthenticatedUserController
{
    public function __invoke()
    {
        return response()->json([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'type' => auth()->user()->role_id,
            'office' => auth()->user()->office_id,
        ]);
    }
}
