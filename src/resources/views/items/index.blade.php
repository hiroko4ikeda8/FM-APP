@extends('layouts.header')

@section('title', '商品一覧')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/index.css') }}">
@endpush

@section('content')
<div class="main-content ">
    <!-- タブリンク -->
    <nav class="nav-container">
        <div class="d-flex justify-con p-4tent-between">
            <!-- 左側：おすすめ・マイリストのテキストリンク -->
            <div class="w-25 d-flex justify-content-end text-end">
                <ul class="nav nav-pills">
                    <li class="nav-item p-2">
                        <a class="nav-link active" id="recommendTab" data-bs-toggle="pill" href="#recommend">おすすめ</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" id="mylistTab" data-bs-toggle="pill" href="#mylist">マイリスト</a>
                    </li>
                </ul>
            </div>

            <!-- 中央：空のスペース -->
            <div class="w-25"></div>

            <!-- 右側：空のスペース -->
            <div class="w-25"></div>
        </div>
    </nav>
    <!-- タブ内容 -->
    <div class="tab-content mt-3">
        <!-- おすすめ商品 -->
        <div id="recommend" class="tab-pane fade show active">
            <div class="item-gallery">
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
        </div>

        <!-- マイリスト商品 -->
        <div id="mylist" class="tab-pane fade">
            <div class="item-gallery">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item text-center">
                            <a href="#">
                                <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="マイリスト商品1" class="img-fluid fixed-size">
                                <p>腕時計</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item text-center">
                            <a href="#">
                                <img src="{{ asset('storage/images/iLoveIMG+d.jpg') }}" alt="マイリスト商品2" class="img-fluid fixed-size">
                                <p>玉ねぎ</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item text-center">
                            <a href="#">
                                <img src="{{ asset('storage/images/Waitress+with+Coffee+Grinder.jpg') }}" alt="マイリスト商品3" class="img-fluid fixed-size">
                                <p>コーヒーミル</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item text-center">
                            <a href="#">
                                <img src="{{ asset('storage/images/Living+Room+Laptop.jpg') }}" alt="マイリスト商品4" class="img-fluid fixed-size">
                                <p>ノートパソコン</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection