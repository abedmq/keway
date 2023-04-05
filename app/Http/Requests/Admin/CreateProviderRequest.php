<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProviderRequest extends FormRequest
{

    public function rules()
    {
        return [
            'mobile' => ['required',
                Rule::unique('users'),
            ],
            'name' => 'required',
            'password' => 'required|min:6',
            'image' => 'required|image',
            'services_id' => 'required|array',
            'lat' => 'required',
            'lng' => 'required',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}
