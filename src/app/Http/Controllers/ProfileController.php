<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Userモデルをインポート

class ProfileController extends Controller
{
    //public function showProfile()
    //{
    // ユーザー情報を取得（ログイン中のユーザー情報）
    //$user = auth()->user(); // ログインユーザー情報を取得


    //return view('auth.profile', compact('user'));
    //}

    public function showProfile()
    {
        return view('auth.profile'); // ビュー 'resources/views/auth/profile.blade.php' を表示
    }

    // プロフィール編集画面を表示
    public function editProfile()
    {
        // 静的なユーザーデータ（例としてダミーのユーザー情報を使用）
        $user = (object) [
            'username' => 'サンプルユーザー',
            'postal_code' => '123-4567',
            'address' => '東京都渋谷区1-1-1',
            'building_name' => 'サンプルビル',
            'profile_picture' => null,  // プロフィール画像がない場合
        ];

        // ダミーデータをビューに渡す
        return view('auth.edit-profile', compact('user'));  // edit.blade.php を表示
    }
}
