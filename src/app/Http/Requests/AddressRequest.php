<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'postal_code' => ['required', 'regex:/^\d{3}-\d{4}$/'], // ハイフンあり8文字
            'address' => ['required', 'string'],
            'buildingName' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'postal_code.required' => '郵便番号は必須です。',
            'postal_code.regex' => '郵便番号はハイフン付きの8文字で入力してください（例：123-4567）',
            'address.required' => '住所は必須です。',
            'buildingName' => '建物名は任意です。',
        ];
    }
}
