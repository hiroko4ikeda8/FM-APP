@extends('layouts.header-auth')

@section('title', 'メール認証')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center" style="width: 100%; max-width: 500px;">
        <p>登録していただいたメールアドレスに認証メールを送付しました。<br>メール認証を完了してください。</p>

        <div class="my-4">
            <a href="{{ route('verification.verify', ['id' => auth()->user()->id, 'hash' => sha1(auth()->user()->email)]) }}" class="btn btn-secondary text-dark">認証はこちらから</a>
        </div>

        <div>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-link text-primary">認証メールを再送する</button>
            </form>
        </div>
    </div>
</div>
@endsection