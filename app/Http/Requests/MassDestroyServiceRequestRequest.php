<?php

namespace App\Http\Requests;

use App\Models\ServiceRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyServiceRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('service_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:service_requests,id',
        ];
    }
}
