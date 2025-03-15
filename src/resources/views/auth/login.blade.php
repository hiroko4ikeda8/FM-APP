@extends('layouts.auth_layout')

@section('title', 'ログイン')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center main-content">
        <h1 class="mb-4">ログイン</h1>

        <form>
            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" class="form-control" id="email" placeholder="メールアドレスを入力してください">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" class="form-control" id="password" placeholder="パスワードを入力してください">
            </div>
            <button type="submit" class="btn btn-danger w-100">ログインする</button>
        </form>

        <div class="mt-3">
            <a href="register.html" class="text-primary">会員登録はこちら</a>
        </div>
    </div>
</div>
@endsection
