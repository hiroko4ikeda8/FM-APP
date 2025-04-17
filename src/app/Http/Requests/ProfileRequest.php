<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'avatar_path' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'username' => 'required|string|max:255',
            'postal_code' => ['required', 'regex:/^\d{3}-\d{4}$/'],
            'address' => 'required|string|max:255',
            'building_name' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'avatar_path.mimes' => 'プロフィール画像は.jpeg、.jpgまたは.png形式でアップロードしてください。',
            'username.required' => 'ユーザー名は必須項目です。',
            'postal_code.required' => '郵便番号は必須項目です。',
            'postal_code.regex' => '郵便番号はハイフン付きの8文字で入力してください（例：123-4567）',
            'address.required' => '住所は必須項目です。',
            'building_name.max' => '建物名は255文字以内で入力してください。',
        ];
    }
}
