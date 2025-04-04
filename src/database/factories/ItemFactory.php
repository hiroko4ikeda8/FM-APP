<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray(); // 既存の user_id を取得
        // 商品データ（カテゴリ情報を含む）
        $products = [
            [
                'name' => '腕時計',
                'price' => 15000,
                'brand_name' => 'ブランドA',
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'condition' => '良好',
                'image_path' => 'storage/images/armani_mens_clock.jpg',
            ],

            [
                'name' => 'HDD',
                'price' => 5000,
                'brand_name' => null,
                'description' => '高速で信頼性の高いハードディスク',
                'condition' => '目立った傷や汚れなし',
                'image_path' => 'storage/images/hdd_hard_disk.jpg',
            ],

            [
                'name' => '玉ねぎ3束',
                'price' => 300,
                'brand_name' => null,
                'description' => '新鮮な玉ねぎ3束のセット',
                'condition' => 'やや傷や汚れあり',
                'image_path' => 'storage/images/iloveimg_d.jpg',
            ],

            [
                'name' => '革靴',
                'price' => 4000,
                'brand_name' => null,
                'description' => 'クラシックなデザインの革靴',
                'condition' => '状態が悪い',
                'image_path' => 'storage/images/leather_shoes.jpg',
            ],

            [
                'name' => 'ノートPC',
                'price' => 45000,
                'brand_name' => null,
                'description' => '高性能なノートパソコン',
                'condition' => '良好',
                'image_path' => 'storage/images/laptop.jpg',
            ],

            [
                'name' => 'マイク',
                'price' => 8000,
                'brand_name' => null,
                'description' => '高音質のレコーディング用マイク',
                'condition' => '目立った傷や汚れなし',
                'image_path' => 'storage/images/music_mic.jpg',
            ],

            [
                'name' => 'ショルダーバッグ',
                'price' => 3500,
                'brand_name' => null,
                'description' => 'おしゃれなショルダーバッグ',
                'condition' => 'やや傷や汚れあり',
                'image_path' => 'storage/images/purse_fashion.jpg',
            ],

            [
                'name' => 'タンブラー',
                'price' => 500,
                'brand_name' => null,
                'description' => '使いやすいタンブラー',
                'condition' => '状態が悪い',
                'image_path' => 'storage/images/tumbler.jpg',
            ],

            [
                'name' => 'コーヒーミル',
                'price' => 4000,
                'brand_name' => null,
                'description' => '手動のコーヒーミル',
                'condition' => '良好',
                'image_path' => 'storage/images/coffee_grinder.jpg',
            ],

            [
                'name' => 'メイクセット',
                'price' => 2500,
                'brand_name' => null,
                'description' => '便利なメイクアップセット',
                'condition' => '目立った傷や汚れなし',
                'image_path' => 'storage/images/makeup_set.jpg',
            ],
        ];

        $product = $products[array_rand($products)]; // ランダムに商品を選択

        return [
            'user_id' => $users[array_rand($users)], // ランダムにuser_idを割り当て
            'name' => $product['name'],
            'price' => $product['price'],
            'brand_name' => $product['brand_name'],
            'description' => $product['description'],
            'condition' => $product['condition'],
            'image_path' => $product['image_path'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
