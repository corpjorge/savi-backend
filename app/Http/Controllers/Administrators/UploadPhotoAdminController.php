<?php

namespace App\Http\Controllers\Administrators;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadPhotoAdminController
{
    public function __invoke(Request $request, User $admin)
    {
        $request->validate(['photo' => 'required|image|max:1024']);

        $this->deleteOldPhoto($admin);

        $admin->update([
            'photo' => $request->file('photo')->store('photos', 'public'),
        ]);

    }

    public function deleteOldPhoto(User $admin)
    {
        if ($admin->photo) {
            File::delete(storage_path("/app/public/{$admin->photo}"));
        }
    }

}
