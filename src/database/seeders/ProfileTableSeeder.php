<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $profiles = [
            [
                'user_id' => 1,
                'avatar_path' => 'storage/images/ネコの足跡のアイコン素材.jpg',
                'name' => '田中 太郎',
                'postal_code' => '100-0001',
                'address' => '東京都千代田区1-1',
                'building_name' => '千代田ビル',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'avatar_path' => 'storage/images/黒猫のフリーアイコン.jpg',
                'name' => '佐藤 花子',
                'postal_code' => '150-0002',
                'address' => '東京都渋谷区2-2',
                'building_name' => '渋谷タワー',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 3,
                'avatar_path' => 'storage/images/三毛猫のアイコン.jpg',
                'name' => '鈴木 次郎',
                'postal_code' => '530-0003',
                'address' => '大阪府大阪市北区3-3',
                'building_name' => '梅田スクエア',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 4,
                'avatar_path' => 'storage/images/黒猫のフリーアイコン.jpg',
                'name' => '高橋 京子',
                'postal_code' => '460-0004',
                'address' => '愛知県名古屋市中区4-4',
                'building_name' => '栄センター',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 5,
                'avatar_path' => 'storage/images/ネコの足跡のアイコン素材.jpg',
                'name' => '中村 大輔',
                'postal_code' => '810-0005',
                'address' => '福岡県福岡市中央区5-5',
                'building_name' => '天神ビル',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($profiles as $profile) {
            Profile::create($profile);
        }
    }
}
