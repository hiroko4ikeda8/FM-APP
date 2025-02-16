<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;  // Userモデルをインポート
use App\Models\Item;  // Itemモデルをインポート
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,  // コメントしたユーザー
            'item_id' => Item::inRandomOrder()->first()->id,  // 商品
            'content' => $this->faker->sentence,  // コメント内容
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
