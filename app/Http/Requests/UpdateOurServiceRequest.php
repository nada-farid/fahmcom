<?php

namespace App\Http\Requests;

use App\Models\OurService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOurServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('our_service_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'type_id' => [
                'nullable',
                'integer',
            ],
            'description' => [
                'required',
            ],
            'icon' => [
                'required',
            ],
        ];
    }
}
