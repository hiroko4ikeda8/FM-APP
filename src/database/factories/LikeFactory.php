<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\User;  // Userモデルをインポート
use App\Models\Item;  // Itemモデルをインポート
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    protected $model = Like::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,  // いいねしたユーザー
            'item_id' => Item::inRandomOrder()->first()->id,  // いいねした商品
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
