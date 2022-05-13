<?php

namespace App\Http\Controllers\Administrators;

use Illuminate\Validation\ValidationException;

class RestoreAdminController
{
    public function __invoke(int $id)
    {
        try {
            $admin = \App\Models\User::onlyTrashed()->findOrFail($id);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'error' => ['user not found.'],
            ]);
        }

        $admin->restore();

    }
}


