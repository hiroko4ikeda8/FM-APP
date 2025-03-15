<?php

namespace App\Providers;

use Laravel\Fortify\Fortify; // ここでインポート
use Illuminate\Support\ServiceProvider;
use App\Actions\Fortify\CreateNewUser;  // 必要な場合はこちらを追加
use Illuminate\Cache\RateLimiting\Limit; // これでOK
use Illuminate\Http\Request;

class FortifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);

       Fortify::registerView(function () {
         return view('auth.register');
        }); 

        Fortify::loginView(function () {
            return view('auth.login');
        });

        //RateLimiter::for('login', function (Request $request) {
        //    $email = (string) $request->email;
            
        //    return Limit::perMinute(10)->by($email . $request->ip());
        //});
    }
}

