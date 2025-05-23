<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            ItemsTableSeeder::class,
            ShippingAddressesTableSeeder::class,
            CommentsTableSeeder::class,
            LikesTableSeeder::class,
            PurchasesTableSeeder::class,
            ProfileTableSeeder::class,
        ]);
    }
}
