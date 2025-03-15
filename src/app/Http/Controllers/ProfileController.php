<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
