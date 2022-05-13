<?php

namespace App\Http\Controllers\Administrators;

use Illuminate\Validation\ValidationException;

class DeleteAdminController
{
    public function __invoke(int $id): void
    {
        try {
            $admin = \App\Models\User::findOrFail($id);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'error' => ['user not found.'],
            ]);
        }

        $admin->delete();

    }
}
