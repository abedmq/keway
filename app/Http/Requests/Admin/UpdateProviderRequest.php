<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProviderRequest extends FormRequest
{

    public function rules()
    {
        return [
            'mobile' => ['required',
                Rule::unique('users')->ignore(request('provider')),
            ],
            'name' => 'required',
            'password' => 'nullable|min:6',
            'image' => 'nullable|image',
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
