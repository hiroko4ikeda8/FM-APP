@extends('layouts.header-basic')

@section('title', 'プロフィール')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/profile.css') }}">

@endpush

@section('content')
<div class="container mt-5">
    <!-- プロフィール情報 -->
    <div class="row mb-3 align-items-center">
        <!-- 左側: アイコン + ユーザー名 -->
        <section class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="me-3">
                <img src="{{ asset('storage/images/三毛猫のアイコン.jpg') }}" alt="アイコン" class="img-fluid" id="profile-picture">
            </div>
            <h3 class="fw-bold mb-0">ユーザー名</h3> <!-- アイコンの右側に配置 -->
        </section>
        <!-- 右側: プロフィール編集ボタン -->
        <section class="col-md-6 d-flex justify-content-center">
            <a href="/mypage/profile" class="btn btn-profile-edit fw-bold">プロフィールを編集</a>
        </section>
    </div>
</div>

<div class="main-content">
    <nav class="nav-container border-bottom pb-2 mb-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active fw-bold" id="buyTab" data-bs-toggle="pill" href="#buy">出品した商品</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold" id="sellTab" data-bs-toggle="pill" href="#sell">購入した商品</a>
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
                            <img src="{{ asset('storage/images/Purse+fashion+pocket.jpg') }}" alt="商品4画像" class="img-fluid fixed-size">
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
                            <img src="{{ asset('storage/images/Living+Room+Laptop.jpg') }}" alt="出品商品4" class="img-fluid fixed-size">
                            <p>ノートパソコン</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection