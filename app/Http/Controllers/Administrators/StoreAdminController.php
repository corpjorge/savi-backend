<?php

namespace App\Http\Controllers\Administrators;

use App\Models\User;
use Illuminate\Validation\Rule;

class StoreAdminController
{
    public function __invoke(\Illuminate\Http\Request $request, User $admin)
    {
        $request->validate($this->rules());
        $admin->create($request->all());
        $admin->offices()->sync($request->get('offices_id'));
    }

    public function rules()
    {
        return [
            'name' => [
                'required', 'string'
            ],
            'role_id' => [
                'required', 'numeric',
                Rule::in([1, 2, 3]),
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore(\Illuminate\Support\Facades\Route::current()->admin ?? null)
            ],
            'document' => [
                'required', Rule::unique((new User)->getTable())->ignore(\Illuminate\Support\Facades\Route::current()->admin ?? null)
            ],
            'image' => [
                'string', 'nullable'
            ],
        ];
    }

}
