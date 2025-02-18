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
        ShippingAddress::create([
            'user_id' => 1,
            'postal_code' => '100-0001',
            'address' => 'Tokyo, Chiyoda, 1-1',
            'building_name' => 'Chiyoda Building',
        ]);

        ShippingAddress::create([
            'user_id' => 2,
            'postal_code' => '150-0001',
            'address' => 'Tokyo, Shibuya, 2-2',
            'building_name' => 'Shibuya Plaza',
        ]);

        ShippingAddress::create([
            'user_id' => 3,
            'postal_code' => '530-0001',
            'address' => 'Osaka, Kita, 3-3',
            'building_name' => 'Kita Tower',
        ]);

        ShippingAddress::create([
            'user_id' => 4,
            'postal_code' => '600-0001',
            'address' => 'Kyoto, Shimogyo, 4-4',
            'building_name' => 'Kyoto Center',
        ]);

        ShippingAddress::create([
            'user_id' => 5,
            'postal_code' => '980-0001',
            'address' => 'Sendai, Aoba, 5-5',
            'building_name' => 'Sendai Heights',
        ]);
    }
}
