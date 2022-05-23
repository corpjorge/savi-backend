<?php

namespace App\Http\Controllers\Authentication;

class VerificationEmailController
{
    public function __invoke(\Illuminate\Http\Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'error' => ['Email already verified.'],
            ]);
        }

        $request->user()->sendEmailVerificationNotification();
    }

}
