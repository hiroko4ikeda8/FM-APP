<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $item1 = Item::create([
            'user_id' => 1,
            'name' => '腕時計',
            'price' => 15000,
            'brand_name' => 'ブランドA',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'condition' => '良好',
            'image_path' => 'storage/image/armani_mens_clock.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $item1->categories()->attach([1, 5, 12]);

        $item2 = Item::create([
            'user_id' => 1, 
            'name' => 'HDD', 
            'price' => 5000, 
            'brand_name' => null, 
            'description' => '高速で信頼性の高いハードディスク', 
            'condition' => '目立った傷や汚れなし', 
            'image_path' => 'storage/image/hdd_hard_disk.jpg', 
            'created_at' => now(), 
            'updated_at' => now()
        ]);
        $item2->categories()->attach([2]);

        $item3 = Item::create([
            'user_id' => 1, 
            'name' => '玉ねぎ3束', 
            'price' => 300, 
            'brand_name' => null, 
            'description' => '新鮮な玉ねぎ3束のセット', 
            'condition' => 'やや傷や汚れあり', 
            'image_path' => 'storage/image/iloveimg_d.jpg', 
            'created_at' => now(), 
            'updated_at' => now()
        ]);
        $item3->categories()->attach([10]);

        $item4 = Item::create([
            'user_id' => 1, 
            'name' => '革靴', 
            'price' => 4000, 
            'brand_name' => null, 
            'description' => 'クラシックなデザインの革靴', 
            'condition' => '状態が悪い', 
            'image_path' => 'storage/image/leather_shoes.jpg', 
            'created_at' => now(), 
            'updated_at' => now()
        ]);
        $item4->categories()->attach([1, 5]);

        $item5 = Item::create([
            'user_id' => 1, 
            'name' => 'ノートPC', 
            'price' => 45000, 
            'brand_name' => null, 
            'description' => '高性能なノートパソコン', 
            'condition' => '良好', 
            'image_path' => 'storage/image/laptop.jpg', 
            'created_at' => now(), 
            'updated_at' => now()
        ]);
        $item5->categories()->attach([2]);

        $item6 = Item::create([
            'user_id' => 1, 
            'name' => 'マイク', 
            'price' => 8000, 
            'brand_name' => null, 
            'description' => '高音質のレコーディング用マイク', 
            'condition' => '目立った傷や汚れなし', 
            'image_path' => 'storage/image/music_mic.jpg', 
            'created_at' => now(), 
            'updated_at' => now()
        ]);
        $item6->categories()->attach([2]);

        $item7 = Item::create([
            'user_id' => 1, 
            'name' => 'ショルダーバッグ', 
            'price' => 3500, 
            'brand_name' => null, 
            'description' => 'おしゃれなショルダーバッグ', 
            'condition' => 'やや傷や汚れあり', 
            'image_path' => 'storage/image/purse_fashion.jpg', 
            'created_at' => now(), 
            'updated_at' => now()
        ]);
        $item7->categories()->attach([1, 4]);

        $item8 = Item::create([
            'user_id' => 1, 
            'name' => 'タンブラー', 
            'price' => 500, 
            'brand_name' => null, 
            'description' => '使いやすいタンブラー', 
            'condition' => '状態が悪い', 
            'image_path' => 'storage/image/tumbler.jpg', 
            'created_at' => now(), 
            'updated_at' => now()
        ]);
        $item8->categories()->attach([10]);

        $item9 = Item::create([
            'user_id' => 1, 
            'name' => 'コーヒーミル', 
            'price' => 4000, 
            'brand_name' => null, 
            'description' => '手動のコーヒーミル', 
            'condition' => '良好', 
            'image_path' => 'storage/image/coffee_grinder.jpg', 
            'created_at' => now(), 
            'updated_at' => now()
        ]);
        $item9->categories()->attach([3, 10]);

        $item10 = Item::create([
            'user_id' => 1, 
            'name' => 'メイクセット', 
            'price' => 2500, 
            'brand_name' => null, 
            'description' => '便利なメイクアップセット', 
            'condition' => '目立った傷や汚れなし', 
            'image_path' => 'storage/image/makeup_set.jpg', 
            'created_at' => now(), 
            'updated_at' => now()
        ]);
        $item10->categories()->attach([1, 4, 6]);
    }
}
