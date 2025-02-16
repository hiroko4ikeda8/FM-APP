<?php

namespace Database\Factories;

use App\Models\ShippingAddress;
use App\Models\User;  // Userモデルをインポート
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingAddressFactory extends Factory
{
    protected $model = ShippingAddress::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,  // ユーザー
            'postal_code' => $this->faker->postcode,  // 郵便番号
            'address' => $this->faker->address,  // 住所
            'building_name' => $this->faker->building_name,  // 建物名
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
