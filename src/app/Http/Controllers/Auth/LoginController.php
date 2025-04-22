<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'ログイン情報が登録されていません。',
            ]);
        }

        return redirect()->intended('/'); // ログイン後の遷移先
    }

    public function logout()
    {
        Auth::logout(); // ログアウト処理
        return redirect('/login'); // ログアウト後にリダイレクトするページ
    }
}
