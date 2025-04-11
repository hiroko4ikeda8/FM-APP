<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AddressReqest extends FormRequest
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
            'postcode' => ['required', 'regex:/^\d{3}-\d{4}$/'], // ハイフンあり8文字
            'address' => ['required', 'string'],
            'build' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'postcode.required' => '郵便番号は必須です。',
            'postcode.regex' => '郵便番号はハイフン付きの8文字で入力してください（例：123-4567）',
            'address.required' => '住所は必須です。',
            'build' => '建物名は任意です。',
        ];
    }
}
