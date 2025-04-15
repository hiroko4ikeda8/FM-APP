<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest; // EditProfileRequestをインポート
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

    public function __construct()
    {
        // 認証済みユーザーのみアクセス可能
        $this->middleware(['auth', 'verified']);
    }
    
    public function showProfile()
    {
        return view('auth.profile'); // ビュー 'resources/views/auth/profile.blade.php' を表示
    }

    public function editProfile()
    {
        $user = auth()->user(); // ログインユーザー取得
        return view('auth.edit-profile', compact('user'));
    }

    public function update(EditProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('images', 'public');
            $data['avatar_path'] = $avatarPath;
        }

        // プロフィール情報の更新
        $user->profile->update($data);

        return redirect()->route('item.index')->with('success', 'プロフィールを更新しました');
    }
}
