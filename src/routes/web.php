<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use Laravel\Fortify\Fortify;
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

Fortify::loginView(function () {
    return view('auth.login');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/', [ItemController::class, 'index'])->name('items.index');

Route::get('/mypage', [ProfileController::class, 'showProfile'])->name('profile.show');
Route::get('mypage/profile', [ProfileController::class, 'editProfile'])->name(('profile.edit'));
Route::post('mypage/profile', [ProfileController::class, 'updateProfile'])->name(('profile.update'));