@extends('layouts.auth_layout')

@section('title', 'メール認証')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center" style="width: 100%; max-width: 500px;">
        <p>登録していただいたメールアドレスに認証メールを送付しました。<br>メール認証を完了してください。</p>

        <div class="my-4">
            <a href="{{ route('verification.verify') }}" class="btn btn-secondary text-dark">認証はこちらから</a>
        </div>

        <div>
            <a href="{{ route('verification.resend') }}" class="text-primary">認証メールを再送する</a>
        </div>
    </div>
</div>
@endsection
