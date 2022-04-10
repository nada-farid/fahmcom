<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . auth()->id(),
            ],
            'phone' => [
                'string',
                'required',
                'size:10',
                'regex:/(05)[0-9]{8}/', 
            ],
        ];
    }  public function messages()
    {
    return [
    'phone.required' => 'رقم الجوال مطلوب.',
    'phone.regex' => '   رقم الجوال غير صالح يجب ان يبدأ 05',
    'phone.size' => '  رقم الجوال يجب ان يكون 10 أرقام.',
    'agree.required'=>'يجب الموافقة علي الشروط والأحكام',
    ];
    }
}
