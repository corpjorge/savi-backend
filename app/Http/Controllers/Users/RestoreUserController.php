<?php

namespace App\Http\Controllers\Users;

class RestoreUserController
{
    public function __invoke(int $id)
    {
        $error = ['error' => ['user not found.']];
        try {
            $user = \App\Models\User::onlyTrashed()->findOrFail($id);
            if ($user->role_id < 4) {
                throw \Illuminate\Validation\ValidationException::withMessages($error);
            }
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages($error);
        }

        $user->restore();
    }
}
