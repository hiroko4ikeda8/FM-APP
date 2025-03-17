@extends('layouts.auth_layout')

@section('title', '会員登録')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-auth.css') }}">
@endpush

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 80px);">
    <div class="card p-4" style="width: 700px; height: 800px;">
        <h2 class="text-center mb-4">会員登録</h2>
        <form method="POST" action="#">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">確認用パスワード</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn-register w-100">登録する</button>
        </form>
        <!-- ログインリンク -->
        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none text-muted">ログインはこちら</a>
        </div>
    </div>
</div>
@endsection