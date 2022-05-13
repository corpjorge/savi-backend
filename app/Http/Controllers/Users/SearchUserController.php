<?php

namespace App\Http\Controllers\Users;

class SearchUserController
{
    public function __invoke($user = null)
    {
        $user = $this->querySearchAdmin($user);
        return $user->toJson();
    }

    public function querySearchAdmin($user)
    {
        return \App\Models\User::where('role_id', '>=', 4)
            ->withTrashed()
            ->where(function ($query) use ($user) {
                $query->orWhere('name', 'like', "%$user%")
                    ->orWhere('email', 'like', "%$user%")
                    ->orWhere('document', 'like', "%$user%");
            })->select(['id', 'name', 'document', 'email', 'deleted_at'])
            ->paginate(10);
    }

}
