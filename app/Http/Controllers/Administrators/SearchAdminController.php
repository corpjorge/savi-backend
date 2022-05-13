<?php

namespace App\Http\Controllers\Administrators;

class SearchAdminController
{
    public function __invoke($admins = NULL): ?string
    {
        $admins = $this->querySearchAdmin();
        return $admins->toJson();
    }

    public function querySearchAdmin($admins = NULL)
    {
        return \App\Models\User::where('role_id','<=', 3)
            ->where(function($query) use ($admins) {
                $query->orWhere('first_name', 'like', "%$admins%")
                    ->orWhere('second_name', 'like', "%$admins%")
                    ->orWhere('last_name', 'like', "%$admins%")
                    ->orWhere('second_last_name', 'like', "%$admins%")
                    ->orWhere('email', 'like', "%$admins%")
                    ->orWhere('document', 'like', "%$admins%");
            })->select(['id', 'first_name','last_name', 'document', 'email', 'deleted_at', 'first_name','last_name'])
            ->paginate(10);
    }

}
