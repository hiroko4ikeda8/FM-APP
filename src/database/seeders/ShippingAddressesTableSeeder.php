<?php

namespace Database\Seeders;

use App\Models\ShippingAddress;

use Illuminate\Database\Seeder;

class ShippingAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingAddress::factory()->count(5)->create();  // 送付先住所を5件作成
    }
}
