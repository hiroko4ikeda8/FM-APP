<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ダミーデータを作成
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),  // ハッシュ化されたパスワード
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Alice Johnson',
            'email' => 'alice.johnson@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Bob Brown',
            'email' => 'bob.brown@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Charlie Davis',
            'email' => 'charlie.davis@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
