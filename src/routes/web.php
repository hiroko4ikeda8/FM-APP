<?php

use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
// メール認証通知を表示するルート
Route::get('/email/verify', function () {
    return view('auth.verify-email'); // 認証待ち画面を表示
})->middleware('auth')->name('verification.notice');

// メール認証リンクを処理するルート
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // メール認証を完了
    return redirect('/mypage/profile'); // プロフィール設定画面にリダイレクト
})->middleware(['auth', 'signed'])->name('verification.verify');

// メール認証リンクを再送信するルート
Route::post('/email/verification-notification', function (Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification(); // 認証リンクを再送信
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/mypage', [ProfileController::class, 'showProfile'])->name('profile.show');
Route::get('mypage/profile', [ProfileController::class, 'editProfile'])
    ->middleware(['auth', 'verified']) // 認証済みかつメール認証済みのユーザーのみアクセス可能
    ->name('profile.edit');

Route::post('mypage/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

// 商品一覧画面へのルート
Route::get('/', [ItemController::class, 'index'])->name('items.index');
// 商品詳細画面へのルート
Route::get('/item/{item_id}', [ItemController::class, 'show'])->name('item.show');
Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');

// 商品購入処理へのルート
Route::get('/purchase/{item_id}', [PurchaseController::class, 'show'])->name('purchase.show');
Route::post('/purchase/{item_id}', [PurchaseController::class, 'store'])->name('purchase.store');

Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'editAddress'])->name('purchase.address.edit');

Route::get('/sell', [ItemController::class, 'create'])->name('sell.create'); // 出品画面表示
Route::post('/sell', [ItemController::class, 'store'])->name('sell.store'); // 出品データ登録


Route::get('/debug-login', function () {
    auth()->loginUsingId(1); // ID=1 のユーザーでログイン
    return redirect('/mypage'); // ログイン後にマイページへ
});
