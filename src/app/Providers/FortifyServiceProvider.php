<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Http\Responses\CustomRegisterResponse;
use App\Actions\Fortify\CreateNewUser;  // 必要な場合はこちらを追加
use Illuminate\Cache\RateLimiting\Limit; // これでOK
use Illuminate\Support\Facades\RateLimiter; // ファサードをインポート
use Laravel\Fortify\Fortify; // ここでインポート
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        // カスタム RegisterResponse をバインド
        $this->app->singleton(RegisterResponse::class, CustomRegisterResponse::class);
    }
    
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if (
                $user &&
                Hash::check($request->password, $user->password) &&
                $user->hasVerifiedEmail() // 👈 メール認証済みチェック
            ) {
                return $user;
            }

            return null;
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            
            return Limit::perMinute(10)->by($email . $request->ip());
        });
    }
}

