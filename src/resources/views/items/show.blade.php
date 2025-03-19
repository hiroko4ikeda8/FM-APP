@extends('layouts.app')

@section('title', '商品詳細')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/show.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-basic.css') }}">
@endpush

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- 左側: 商品画像 -->
        <div class="col-md-6">
            <div class="product-image">
                <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="商品画像" class="item-image">
            </div>
        </div>

        <!-- 右側: 商品詳細フォーム -->
        <div class="col-md-6">
            <div class="item-details">
                <!-- 商品名 -->
                <div class="form-group mb-3">
                    <label for="productName">商品名</label>
                    <p id="productName">商品名がここに入ります</p> <!-- 仮のデータ -->
                    <label for="brandName">ブランド名</label>
                    <p id="brandName">ブランド名がここに入ります</p> <!-- 仮のデータ -->
                </div>

                <!-- 金額（税込み） -->
                <div class="form-group mb-3">
                    <label for="price">金額（税込み）</label>
                    <p id="price">￥5000</p> <!-- 仮のデータ -->
                </div>
                <!-- いいね・コメントアイコンの追加 -->
                <div class="form-group mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset('images/like-icon.png') }}" alt="いいね" class="icon" style="width: 30px; height: 30px;">
                        <span>いいね</span>
                    </div>
                    <div>
                        <img src="{{ asset('images/comment-icon.png') }}" alt="コメント" class="icon" style="width: 30px; height: 30px;">
                        <span>コメント</span>
                    </div>
                </div>

                <!-- 購入手続きボタン -->
                <div class="form-group mb-3">
                    <button class="btn btn-primary w-100">購入手続き</button>
                </div>

                <!-- 商品説明 -->
                <div class="form-group mb-3">
                    <label for="description">商品説明</label>
                </div>

                <!-- カラー -->
                <div class="form-group mb-3">
                    <label for="color">カラー:</label>
                    <p id="color">シルバー</p> <!-- 仮のデータ -->
                </div>

                <!-- 商品の状態 -->
                <div class="form-group mb-3">
                    <label for="condition">商品の状態</label>
                    <p id="condition">新品</p> <!-- 仮のデータ -->
                </div>

                <!-- 商品説明 -->
                <div class="form-group mb-3">
                    <label for="description">商品の情報</label>
                </div>
                <!-- カテゴリー -->
                <div class="form-group mb-3">
                    <label for="category">カテゴリー</label>
                    <p id="category">ファッション</p> <!-- 仮のデータ -->
                </div>

                <!-- コメント -->
                <div class="form-group mb-3">
                    <label for="comments">コメント</label>
                </div>

                <!-- admin画像の表示窓 -->
                <div class="form-group mb-3">
                    <div class="image-display-box">
                        <img src="仮アイコン画像のパス" alt="admin画像" class="item-image">
                    </div>
                    <label for="imageDisplay">admin</label>
                </div>

                <!-- コメントを入力するボックス -->
                <div class="form-group mb-3">
                    <label for="commentBox">商品へのコメント</label>
                    <textarea id="commentBox" class="form-control" rows="3"></textarea>
                </div>

                <!-- コメント送信ボタン -->
                <div class="form-group mb-3">
                    <button id="submitComment" class="btn btn-success w-100">コメントを送信する</button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection