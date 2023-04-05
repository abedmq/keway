<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest {

    public function rules()
    {
        return [
            'mobile'    => ['required',
                           Rule::unique('users')->ignore(request('user')),
            ],
            'name'     => 'required',
            'password' => 'nullable|min:6',
            'image' => 'nullable|image',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}
