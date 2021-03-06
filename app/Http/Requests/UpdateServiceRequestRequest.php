<?php

namespace App\Http\Requests;

use App\Models\ServiceRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_request_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'service_id' => [
                'required',
                'integer',
            ],
            'extra_info' => [
                'nullable',
            ],
        ];
    }
}
