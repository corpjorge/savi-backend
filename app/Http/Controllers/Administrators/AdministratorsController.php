<?php

namespace App\Http\Controllers\Administrators;

use App\Models\User;

class AdministratorsController
{
    public function __invoke(User $user)
    {
        return $user->where('role_id', '<=', 3)->withTrashed()->limit(10)->latest('updated_at')
            ->get([
                'id',
                'name',
                'email',
                'role_id',
                'photo',
                'break_time',
                'isActive',
                'deleted_at'
            ]);
    }

}
