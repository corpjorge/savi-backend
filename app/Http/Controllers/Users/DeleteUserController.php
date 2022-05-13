<?php

namespace App\Http\Controllers\Users;

class DeleteUserController
{
    public function __invoke(int $id)
    {
        $error = ['error' => ['user not found.']];
        try {
            $user = \App\Models\User::findOrFail($id);
            if ($user->role_id < 4) {
                throw \Illuminate\Validation\ValidationException::withMessages($error);
            }
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages($error);
        }

        $user->delete();
    }

}
