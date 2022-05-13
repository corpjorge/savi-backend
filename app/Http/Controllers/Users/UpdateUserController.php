<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Validation\Rule;

class UpdateUserController
{
    public function __invoke(\Illuminate\Http\Request $request, User $user)
    {
        if ($user->role_id < 4) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'error' => ['user not found.'],
            ]);
        }
        $request->validate($this->rules());
        $user->update($request->all());
    }

    public function rules()
    {
        return [
            'name' => [
                'required', 'string',
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore(\Illuminate\Support\Facades\Route::current()->user ?? null)
            ],
            'role_id' => [
                'required', 'numeric',
                Rule::in([4, 5]),
            ],
            'document' => [
                'required', Rule::unique((new User)->getTable())->ignore(\Illuminate\Support\Facades\Route::current()->user ?? null)
            ],
            'office_id' => [
                'required', 'numeric',
                Rule::exists((new \App\Models\Office)->getTable(), 'id'),
            ],
        ];
    }

}
