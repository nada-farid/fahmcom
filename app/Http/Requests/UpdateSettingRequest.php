<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'about_us' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'product' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'snapchat' => [
                'string',
                'nullable',
            ],
            'supportive_partner' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'service' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'experience_year' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'contact_text' => [
                'required',
            ],
            'service_text' => [
                'required',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'youtube' => [
                'string',
                'nullable',
            ],
            'whatsapp' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'required',
            ],
            'order_way' => [
                'required',
            ],
            'footer_image' => [
                'required',
            ],
            'about_image' => [
                'required',
            ],
        ];
    }
}
