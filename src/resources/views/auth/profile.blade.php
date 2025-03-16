@extends('layouts.app')

@section('title', 'プロフィール')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/profile.css') }}">
@endpush

@section('content')
<div class="container mt-5">
    <!-- 上のフォーム: アイコンとユーザー名 -->
    <div class="row mb-3">
        <div class="col-md-4">
            <img src="{{ asset('storage/images/三毛猫のアイコン.jpg') }}" alt="アイコン" class="img-fluid" id="profile-picture">
        </div>
        <div class="col-md-4">
            <h4>テストユーザー</h4> <!-- 仮のユーザー名 -->
        </div>
        <div class="col-md-4">
            <a href="/mypage/profile" class="btn btn-primary">プロフィールを編集</a> <!-- 仮の編集ボタン -->
        </div>
    </div>

    <!-- 下のフォーム: 商品リスト -->
    <div class="row mt-4">
        <div class="col-md-6">
            <p class="custom-line">出品した商品</p>
            <ul class="list-unstyled">
                <li>
                    <a href="#" style="display: block; text-align: center;">
                        <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="商品画像" width="150" height="150">
                    </a>
                    <a href="#" style="display: block; text-align: center;">サンプル商品1</a>
                </li>
                <li>
                    <a href="#" style="display: block; text-align: center;">
                        <img src="{{ asset('storage/images/HDD+Hard+Disk.jpg') }}" alt="商品画像" width="150" height="150">
                    </a>
                    <a href="#" style="display: block; text-align: center;">サンプル商品2</a>
                </li>
            </ul>
        </div>

        <div class="col-md-6">
            <p class="custom-line">購入した商品</p>
            <ul class="list-unstyled">
                <li>
                    <a href="#" style="display: block; text-align: center;">
                        <img src="{{ asset('storage/images/Purse+fashion+pocket.jpg') }}" alt="商品画像" width="150" height="150">
                    </a>
                    <a href="#" style="display: block; text-align: center;">サンプル商品3</a>
                </li>
                <li>
                    <a href="#" style="display: block; text-align: center;">
                        <img src="{{ asset('storage/images/外出メイクアップセット.jpg') }}" alt="商品画像" width="150" height="150">
                    </a>
                    <a href="#" style="display: block; text-align: center;">サンプル商品4</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection