@extends('layouts.app')

@section('title', '商品一覧')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-basic.css') }}">
@endpush

@section('content')
<div class="main-content">
    <!-- 商品一覧のコンテンツ -->
    <h1>商品一覧</h1>

    <!-- ナビゲーションメニュー -->
    <nav class="nav-container border-bottom pb-2 mb-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" id="recommendTab" data-bs-toggle="pill" href="#recommend">おすすめ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mylistTab" data-bs-toggle="pill" href="#mylist">マイリスト</a>
            </li>
        </ul>
    </nav>

    <p>ここに商品一覧を表示</p>
    <!-- 商品表示 -->
    <div class="tab-content mt-3">
        <!-- おすすめ商品 -->
        <div id="recommend" class="tab-pane fade show active">
            <div class="items">
                <!-- 静的なダミーデータを表示 -->
                <div class="item">
                    <a href="#">
                        <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="商品1画像" class="img-fluid fixed-size">
                        <p>腕時計</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img src="{{ asset('storage/images/Tumbler+souvenir.jpg') }}" alt="商品2画像" class="img-fluid fixed-size">
                        <p>タンブラー</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img src="{{ asset('storage/images/Music+Mic+4632231.jpg') }}" alt="商品3画像" class="img-fluid fixed-size">
                        <p>マイク</p>
                    </a>
                </div>
                <!-- 他の商品を追加 -->
            </div>
        </div>

        <!-- マイリスト商品 -->
        <div id="mylist" class="tab-pane fade">
            <div class="items">
                <!-- マイリストの商品をここに追加 -->
                <div class="item">
                    <a href="#">
                        <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="マイリスト商品1" class="img-fluid fixed-size">
                        <p>腕時計</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img src="{{ asset('storage/images/iLoveIMG+d.jpg') }}" alt="マイリスト商品2" class="img-fluid fixed-size">
                        <p>玉ねぎ</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img src="{{ asset('storage/images/Waitress+with+Coffee+Grinder.jpg') }}" alt="マイリスト商品3" class="img-fluid  fixed-size">
                        <p>コーヒーミル</p>
                    </a>
                </div>
                <!-- 他のマイリスト商品も追加可能 -->
            </div>
        </div>
    </div>
</div>
@endsection