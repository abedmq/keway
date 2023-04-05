<?php

namespace App\Http\Requests\Admin;

use App\Models\OrderStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
{

    public function rules()
    {
        return [
            'service_id' => 'required',
            'status_id' => 'required',
            'cancel_reason_id' => 'required_if:status_id,' . OrderStatus::CANCEL,
            'cancel_reason' => 'required_if:cancel_reason_id,0',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}
