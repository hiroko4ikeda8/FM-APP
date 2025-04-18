<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest; // ProfileRequestをインポート
use Illuminate\Http\Request;
use App\Models\User; // Userモデルをインポート

class ProfileController extends Controller
{
    public function __construct()
    {
        // 認証済みユーザーのみアクセス可能
        $this->middleware(['auth', 'verified']);
    }

    public function showProfile()
    {
        $user = auth()->user();

        // 購入した商品を取得
        $purchasedItems = $user->purchases;

        // 出品した商品を取得
        $soldItems = $user->items;

        return view('auth.profile', compact('user', 'purchasedItems', 'soldItems'));
    }

    public function editProfile()
    {
        $user = auth()->user(); // ログインユーザー取得
        return view('auth.edit-profile', compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();

    if ($request->hasFile('avatar_path')) {
        $avatarPath = $request->file('avatar_path')->store('images', 'public');
        $data['avatar_path'] = $avatarPath;
    }

    $user->profile->update($data);

    // 🧠 リクエストに "first" が来ていたら初回とみなす
    if ($request->has('first') && $request->input('first') === 'true') {
        return redirect()->route('item.index')->with('success', 'プロフィール登録が完了しました');
    } else {
        dd('通常のリダイレクト');
        return redirect()->route('profile.show')->with('success', 'プロフィールを更新しました');
    }
}

}
