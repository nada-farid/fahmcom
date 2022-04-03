<?php

namespace App\Http\Requests;

use App\Models\ServieceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServieceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('serviece_type_edit');
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
