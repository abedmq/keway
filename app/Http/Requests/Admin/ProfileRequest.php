<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest {

    public function rules()
    {
        return [
//            'email'    => 'required|unique:admins,email,'.auth('admin')->id(),
            'name'     => 'required|min:3',
            'password' => 'nullable|min:6|confirmed',
            'image'=>'nullable|image'
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}