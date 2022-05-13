<?php

namespace App\Http\Controllers\Administrators;

use App\Models\User;

class AdministratorsController
{
    public function __invoke(User $user)
    {
        return $user->where('role_id','<=',3)
            ->withTrashed()
            ->latest('updated_at')
            ->select(['id', 'name', 'document', 'email', 'deleted_at'])
            ->paginate(10);
    }

}
