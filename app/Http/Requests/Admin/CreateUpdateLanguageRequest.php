<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUpdateLanguageRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}
