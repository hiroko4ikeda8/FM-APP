<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Item;
use App\Models\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = [];

        for ($i = 0; $i < 20; $i++) { // 20件のいいねデータを作成
            $userId = User::inRandomOrder()->first()->id;
            $itemId = Item::inRandomOrder()->first()->id;

            // 同じ組み合わせが存在しない場合にのみデータを挿入
            Like::firstOrCreate(
                ['user_id' => $userId, 'item_id' => $itemId],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
