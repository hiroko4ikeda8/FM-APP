<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
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


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::get('/', [ItemController::class, 'index'])->name('items.index');
// 商品詳細画面へのルート
Route::get('/item/{item_id}', [ItemController::class, 'show'])->name('item.show');

// 商品購入処理へのルート

Route::get('/sell', [ItemController::class, 'create'])->name('sell.create'); // 出品画面表示
Route::post('/sell', [ItemController::class, 'store'])->name('sell.store'); // 出品データ登録

Route::get('/mypage', [ProfileController::class, 'showProfile'])->name('profile.show');
Route::get('mypage/profile', [ProfileController::class, 'editProfile'])->name(('profile.edit'));
Route::post('mypage/profile', [ProfileController::class, 'updateProfile'])->name(('profile.update'));