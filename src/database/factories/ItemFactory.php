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

        return [
            'user_id' => User::inRandomOrder()->first()->id,  // ランダムにユーザーを設定
            'name' => $name,  // 商品名
            'description' => $this->faker->sentence,  // 商品説明
            'price' => $this->faker->numberBetween(500, 50000),  // 価格
            'brand_name' => $this->faker->company,  // ブランド名
            'condition' => $this->faker->randomElement(['良好', '目立った傷や汚れ無し', 'やや傷や汚れあり', '状態が悪い']),  // 商品の状態
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
