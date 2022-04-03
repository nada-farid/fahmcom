<?php

namespace App\Http\Requests;

use App\Models\ServieceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServieceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('serviece_type_create');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'required',
            ],
        ];
    }
}
