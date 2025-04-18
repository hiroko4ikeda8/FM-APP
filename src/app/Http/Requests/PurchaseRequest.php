<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'payment_method' => 'required',
            'shipping_address_id' => 'required|exists:shipping_addresses,id',
        ];
    }

    public function messages()
    {
        return [
            'payment_method' => '支払い方法は必須です。',
            'shipping_address_id.required' => '配送先住所は必須です。',
        ];
    }
}
