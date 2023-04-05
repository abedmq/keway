<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest {

    public function rules()
    {
        return [
            'mobile'    => 'required|unique:users',
            'name'     => 'required',
            'password' => 'required|min:6',
            'image' => 'required|image',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}
