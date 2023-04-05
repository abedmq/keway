<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest {

    public function rules()
    {
        return [
            //
            'name'     => 'required',
            'email'    => ['required', 'email',
                           Rule::unique('users')->ignore(request('user')),
            ],
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function authorize()
    {
        return auth()->user()->isAdmin();
    }
}