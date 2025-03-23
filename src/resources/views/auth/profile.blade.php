@extends('layouts.header')

@section('title', 'プロフィール')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-basic.css') }}">
@endpush

@section('content')
<div class="container mt-5">
    <!-- 上のフォーム: アイコンとユーザー名 -->
    <div class="row mb-3">
        <div class="col-md-3">
            <img src="{{ asset('storage/images/三毛猫のアイコン.jpg') }}" alt="アイコン" class="img-fluid" id="profile-picture">
        </div>
        <div class="col-md-3">
            <h3>テストユーザー</h3> <!-- 仮のユーザー名 -->
        </div>
        <div class="col-md-3">
            <a href="/mypage/profile" class="btn btn-profile-edit">プロフィールを編集</a> <!-- プロフィール編集ページへのリンク -->
        </div>
    </div>
</div>
<div class="main-content">
    <nav class="nav-container border-bottom pb-2 mb-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" id="buyTab" data-bs-toggle="pill" href="#buy">購入した商品</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sellTab" data-bs-toggle="pill" href="#sell">出品した商品</a>
            </li>
        </ul>
    </nav>
    <div class="tab-content mt-3">
        <div id="buy" class="tab-pane fade show active">
            <div class="row">
                <div class="col-md-3">
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="商品1画像" class="img-fluid fixed-size">
                            <p>腕時計</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{ asset('storage/images/Tumbler+souvenir.jpg') }}" alt="商品2画像" class="img-fluid fixed-size">
                            <p>タンブラー</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{ asset('storage/images/Music+Mic+4632231.jpg') }}" alt="商品3画像" class="img-fluid fixed-size">
                            <p>マイク</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{ asset('storage/images/Purse+fashion+pocket.jpg') }}" alt="商品3画像" class="img-fluid fixed-size">
                            <p>ショルダーバッグ</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="sell" class="tab-pane fade">
            <div class="row">
                <div class="col-md-3">
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="出品商品1" class="img-fluid fixed-size">
                            <p>腕時計</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{ asset('storage/images/iLoveIMG+d.jpg') }}" alt="出品商品2" class="img-fluid fixed-size">
                            <p>玉ねぎ</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{ asset('storage/images/Waitress+with+Coffee+Grinder.jpg') }}" alt="出品商品3" class="img-fluid fixed-size">
                            <p>コーヒーミル</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{ asset('storage/images/Living+Room+Laptop.jpg') }}" alt="出品商品3" class="img-fluid fixed-size">
                            <p>ノートパソコン</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection