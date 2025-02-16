<?php

namespace Database\Factories;

use App\Models\Purchase;
use App\Models\User;  // Userモデルをインポート
use App\Models\Item;  // Itemモデルをインポート
use App\Models\ShippingAddress;  //ShippingAddressモデルをインポート
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,  // 購入者
            'item_id' => Item::inRandomOrder()->first()->id,  // 購入した商品
            'shipping_address_id' => ShippingAddress::inRandomOrder()->first()->id,  // 送付先
            'payment_method' => $this->faker->randomElement(['コンビニ払い', 'カード払い']),  // 支払い方法
            'total_price' => $this->faker->numberBetween(500, 50000), // 合計金額
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
