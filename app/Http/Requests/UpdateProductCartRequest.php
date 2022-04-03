<?php

namespace App\Http\Requests;

use App\Models\ProductCart;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductCartRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_cart_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
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
                'unique:product_carts,phone,' . request()->route('product_cart')->id,
            ],
            'city_id' => [
                'required',
                'integer',
            ],
            'address' => [
                'string',
                'required',
            ],
            'extra_info' => [
                'required',
            ],
        ];
    }
}
