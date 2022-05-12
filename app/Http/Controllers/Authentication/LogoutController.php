<?php

namespace App\Http\Controllers\Authentication;

class LogoutController
{
    public function __invoke()
    {
        auth()->user()->tokens()->delete();
    }

}
