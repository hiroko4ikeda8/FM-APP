@extends('layouts.auth_layout')

@section('title', 'ログイン')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-auth.css') }}">
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 80px);">
    <div class="card p-4" style="width: 700px; height: 800px;">
        <h2 class="text-center mb-4">ログイン</h2>
        <form method="POST" action="#">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" class="form-control" id="email" placeholder="メールアドレスを入力してください">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" class="form-control" id="password" placeholder="パスワードを入力してください">
            </div>
            <button type="submit" class="btn-login w-100">ログインする</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('register') }}" class="text-decoration-none text-muted">会員登録はこちら</a>
        </div>
        </h2>
    </div>
    @endsection