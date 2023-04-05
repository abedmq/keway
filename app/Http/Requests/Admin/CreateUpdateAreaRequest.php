<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUpdateAreaRequest extends FormRequest
{

    public function rules()
    {
        return [
            'lang' => 'required|array',
            'lang.title' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'diameter' => 'required|integer|min:0',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}
