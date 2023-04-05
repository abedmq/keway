<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUpdateCancelReasonRequest extends FormRequest
{

    public function rules()
    {
        return [
            'lang' => 'required|array',
            'lang.title' => 'required',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}
