@extends('layouts.app')

@section('title', 'プロフィール')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/edit-profile.css') }}">
@endpush

@section('content')
<div class="container mt-5">
    <h2>プロフィール</h2>

    <!-- 上のフォーム: アイコンとユーザー名 -->
    <div class="row mb-3">
        <div class="col-md-4">
            <img src="{{ asset('images/default-avatar.jpg') }}" alt="アイコン" class="img-fluid" id="profile-picture">
        </div>
        <div class="col-md-4">
            <h4>{{ Auth::user()->username }}</h4> <!-- ユーザー名 -->
        </div>
        <div class="col-md-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">プロフィールを編集</a> <!-- 編集ボタン -->
        </div>
    </div>

    <!-- 下のフォーム: 商品リスト -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h5>出品した商品</h5>
            <ul>
                @foreach($user->items as $item)
                <li><a href="{{ route('item.show', $item->id) }}">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像" width="50">
                        {{ $item->name }}
                    </a></li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-6">
            <h5>購入した商品</h5>
            <ul>
                @foreach($user->purchases as $purchase)
                <li><a href="{{ route('item.show', $purchase->item->id) }}">
                        <img src="{{ asset('storage/' . $purchase->item->image) }}" alt="商品画像" width="50">
                        {{ $purchase->item->name }}
                    </a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection