<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        // 提供された商品名リスト
        $names = [
            '腕時計',
            'HDD',
            '玉ねぎ3束',
            '革靴',
            'ノートPC',
            'マイク',
            'ショルダーバッグ',
            'タンブラー',
            'コーヒーミル',
            'メイクセット'
        ];

        // ランダムに名前を選択
        $name = $this->faker->randomElement($names);

        // 日本語のブランド名リスト
        $brandNames = [
            // 家電・電子機器
            'ソニー',
            'パナソニック',
            'シャープ',
            '東芝',
            '富士通',
            'ニコン',
            'キャノン',

            // ファッション
            'ユニクロ',
            'GU',
            '無印良品',
            'アディダス',
            'ナイキ',
            'プーマ',
            'ニューバランス',

            // 車・バイク
            'トヨタ',
            'ホンダ',
            'スズキ',
            'カワサキ',
            'ヤマハ',
            '日産',

            // 文房具・生活雑貨
            'ダイソー',
            '無印良品',
            'コクヨ',
            'パイロット',
            '三菱鉛筆',

            // 食品・飲料
            'サントリー',
            'キリン',
            'アサヒ',
            '日清',
            '明治',
            'カルビー',

            // 化粧品・美容
            '資生堂',
            'カネボウ',
            '花王',
            'KOSE',
            'DHC',

            // アウトドア・スポーツ
            'モンベル',
            'コールマン',
            'ザ・ノース・フェイス',
            'パタゴニア'
        ];

        // ランダムにブランド名を選択
        $brandName = $this->faker->randomElement($brandNames);

        return [
            'user_id' => User::inRandomOrder()->first()->id,  // ランダムにユーザーを設定
            'name' => $name,  // 商品名
            'description' => $this->faker->realText(255),  // 商品説明
            'price' => $this->faker->numberBetween(500, 50000),  // 価格
            'brand_name' => $brandName,  // ブランド名
            'condition' => $this->faker->randomElement(['良好', '目立った傷や汚れ無し', 'やや傷や汚れあり', '状態が悪い']),  // 商品の状態
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
