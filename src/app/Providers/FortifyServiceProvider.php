<?php

namespace App\Providers;

use Laravel\Fortify\Fortify;
use Illuminate\Support\ServiceProvider;
use App\Actions\Fortify\CreateNewUser;  // 必要な場合はこちらを追加

class FortifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
    Fortify::createUsersUsing(CreateNewUser::class);

        // 会員登録画面のBladeをカスタマイズ
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // ログイン画面のBladeをカスタマイズ
        Fortify::loginView(function () {
            return view('auth.login'); // ここがカスタムBladeファイルになる
        });

        RateLimiter::for(
            'login',
            function (Request $request) {
                $email = (string) $request->email;

                return Limit::perMinute(10)->by($email . $request->ip());
            }
        );

    }
}

