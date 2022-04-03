<?php

namespace App\Http\Requests;

use App\Models\ServieceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyServieceTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('serviece_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:serviece_types,id',
        ];
    }
}
