@extends('layouts.header-auth')

@section('title', 'メール認証誘導画面')
<link rel="stylesheet" href="{{ asset('css/auth/verify-email.css') }}">

@section('content')
<div class="container-fluid">
    <div class="main-content">
        <div class="text-center">
            <p>登録していただいたメールアドレスに認証メールを送付しました。<br>メール認証を完了してください。</p>

            <div class="my-4">
                <a href="{{ URL::signedRoute('verification.verify', ['id' => auth()->user()->id, 'hash' => sha1(auth()->user()->email)]) }}" class="btn btn-secondary text-dark">認証はこちらから</a>
            </div>

            <div>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-primary">認証メールを再送する</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection