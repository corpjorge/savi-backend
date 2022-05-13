<?php

namespace App\Http\Controllers\Administrators;

class SearchAdminController
{
    public function __invoke($admins = null)
    {
        $admins = $this->querySearchAdmin($admins);
        return $admins->toJson();
    }

    public function querySearchAdmin($admins)
    {
        return \App\Models\User::where('role_id','<=', 3)
            ->where(function($query) use ($admins) {
                $query->orWhere('name', 'like', "%$admins%")
                    ->orWhere('email', 'like', "%$admins%")
                    ->orWhere('document', 'like', "%$admins%");
            })->select(['id', 'name', 'document', 'email', 'deleted_at'])
            ->paginate(10);
    }

}
