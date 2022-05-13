<?php

namespace App\Http\Controllers\Users;

use App\Models\User;

class UsersController
{
    public function __invoke(User $user)
    {
        return $user->where('role_id', 4)
            ->withTrashed()
            ->latest('updated_at')
            ->select(['id','document', 'email', 'deleted_at', 'name'])
            ->paginate(10);
    }

}
