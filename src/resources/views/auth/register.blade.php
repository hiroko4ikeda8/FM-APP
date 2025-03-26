@extends('layouts.header-auth')

@section('title', '会員登録')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endpush

@section('content')
<!-- container-fluid を使用して、最大幅の制限を解除 -->
<div class="container-fluid d-flex justify-content-center">
    <!-- メインコンテンツ -->
    <div class="main-content">
        <!-- タイトルセクション -->
        <h2 class="text-center mb-4">会員登録</h2>

        <!-- 会員登録フォームセクション -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- エラーメッセージの表示 -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- ユーザー名セクション -->
            <div class="form-section mb-4">
                <label for="name" class="form-label">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <!-- メールアドレスセクション -->
            <div class="form-section mb-4">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <!-- パスワードセクション -->
            <div class="form-section mb-4">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- 確認用パスワードセクション -->
            <div class="form-section mb-4">
                <label for="password_confirmation" class="form-label">確認用パスワード</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <!-- 登録ボタンセクション -->
            <div class="form-section mb-4 mt-5">
                <button type="submit" class="btn-register w-100">登録する</button>
            </div>
        </form>

        <!-- ログインリンクセクション -->
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-decoration-none text-muted">ログインはこちら</a>
        </div>
    </div>
</div>
@endsection