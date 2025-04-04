<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $items = Item::factory(30)->create(); // 30件のデータを作成

        // 商品名とカテゴリのマッピング
        $categoryMapping = [
            '腕時計' => [1, 5, 12],
            'HDD' => [2],
            '玉ねぎ3束' => [10],
            '革靴' => [1, 5],
            'ノートPC' => [2],
            'マイク' => [2],
            'ショルダーバッグ' => [1, 4],
            'タンブラー' => [10],
            'コーヒーミル' => [3, 10],
            'メイクセット' => [1, 4, 6],
        ];

        // 各商品のカテゴリを紐付ける
        foreach ($items as $item) {
            if (isset($categoryMapping[$item->name])) {
                $item->categories()->attach($categoryMapping[$item->name]);
            }
        }
    }
}
