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
        Item::factory(15)->create()->each(function ($item) {
            // ランダムに1〜3個のカテゴリを取得
            $categories = Category::inRandomOrder()->limit(rand(1, 3))->pluck('id');

            // 中間テーブルに保存
            $item->categories()->attach($categories);

        });
    }
}
