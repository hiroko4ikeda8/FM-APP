@extends('layouts.auth_layout')

@section('title', 'ログイン')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endpush

@section('content')
<!-- container-fluid を使用して、最大幅の制限を解除 -->
<div class="container-fluid d-flex justify-content-center">
    <div class="main-content">
        <!-- タイトルセクション -->
        <h2 class="text-center mb-4">ログイン</h2>
        <!-- ログインフォームセクション -->
        <form method="POST" action="#">
            @csrf
            <!-- メールアドレスセクション -->
            <div class="form-section mb-4">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <!-- パスワードセクション -->
            <div class="form-section mb-4">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <!-- ログインボタンセクション -->
            <div class="form-section mb-4 mt-5">
                <button type="submit" class="btn-login w-100">ログインする</button>
            </div>
        </form>
        <!-- 会員登録リンクセクション -->
        <div class="text-center mt-4">
            <a href="{{ route('register') }}" class="text-decoration-none text-muted">会員登録はこちら</a>
        </div>
    </div>
</div>
@endsection