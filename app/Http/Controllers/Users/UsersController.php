<?php

namespace App\Http\Controllers\Users;

use App\Models\User;

class UsersController
{
    public function __invoke(User $user)
    {
        return $user->where('role_id', 4)->withTrashed()->limit(10)->latest('updated_at')->get(['id', 'name', 'document', 'deleted_at']);
    }

}
