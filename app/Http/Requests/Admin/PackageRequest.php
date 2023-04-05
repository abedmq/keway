<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                 => 'required',
            'price'                => 'required|integer',
            'max_group_manage'     => 'required|integer',
            'max_monthly_messages' => 'nullable|integer',
            'max_added_contact'    => 'nullable|integer',
        ];
    }
}
