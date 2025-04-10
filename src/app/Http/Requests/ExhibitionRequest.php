<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            // 商品名：入力必須
            'name' => ['required'],

            // 商品説明：入力必須、最大255文字
            'description' => ['required', 'max:255'],

            // 商品画像：アップロード必須、jpeg/pngのみ
            'image' => ['required', 'image', 'mimes:jpeg,png'],

            // 商品のカテゴリー：選択必須
            'category_id' => ['required'],

            // 商品の状態：選択必須
            'condition' => ['required'],

            // 商品価格：入力必須、数値、0以上
            'price' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名は必須です。',
            'description.required' => '商品説明は必須です。',
            'description.max' => '商品説明は255文字以内で入力してください。',
            'image.required' => '商品画像は必須です。',
            'image.image' => '画像ファイルを選択してください。',
            'image.mimes' => '画像はjpegまたはpng形式でアップロードしてください。',
            'category_id.required' => '商品のカテゴリーを選択してください。',
            'condition.required' => '商品の状態を選択してください。',
            'price.required' => '販売価格は必須です。',
            'price.numeric' => '販売価格は数値で入力してください。',
            'price.min' => '販売価格は0円以上で入力してください。',
        ];
    }
}
