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
                </div>

                <!-- ブランド名 -->
                <div class="form-group mb-3">
                    <label for="brandName">ブランド名</label>
                    <p id="brandName">ブランド名がここに入ります</p> <!-- 仮のデータ -->
                </div>

                <!-- 金額（税込み） -->
                <div class="form-group mb-3">
                    <label for="price">金額（税込み）</label>
                    <p id="price">￥5000</p> <!-- 仮のデータ -->
                </div>

                <!-- 購入手続きボタン -->
                <div class="form-group mb-3">
                    <button class="btn btn-primary w-100">購入手続き</button>
                </div>

                <!-- 商品説明 -->
                <div class="form-group mb-3">
                    <label for="description">商品説明</label>
                    <p id="description">商品の説明がここに入ります。例えば、状態や特徴など。</p> <!-- 仮のデータ -->
                </div>

                <!-- カラー -->
                <div class="form-group mb-3">
                    <label for="color">カラー</label>
                    <p id="color">シルバー</p> <!-- 仮のデータ -->
                </div>

                <!-- 商品の状態 -->
                <div class="form-group mb-3">
                    <label for="condition">商品の状態</label>
                    <p id="condition">新品</p> <!-- 仮のデータ -->
                </div>

                <!-- カテゴリー -->
                <div class="form-group mb-3">
                    <label for="category">カテゴリー</label>
                    <p id="category">ファッション</p> <!-- 仮のデータ -->
                </div>

                <!-- コメント -->
                <div class="form-group mb-3">
                    <label for="comments">コメント</label>
                    <p id="comments">商品の説明や問い合わせがここに表示されます。</p> <!-- 仮のデータ -->
                </div>

                <!-- コメントを入力するボックス -->
                <div class="form-group mb-3">
                    <label for="commentBox">商品へのコメント</label>
                    <textarea id="commentBox" class="form-control" rows="3"></textarea>
                </div>

                <!-- コメント送信ボタン -->
                <div class="form-group mb-3">
                    <button class="btn btn-success w-100">コメントを送信する</button>
                </div>

                <!-- 商品画像の表示窓 -->
                <div class="form-group mb-3">
                    <label for="imageDisplay">画像</label>
                    <div class="image-display-box">
                        <img src="仮画像のパス" alt="商品画像" class="item-image">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection