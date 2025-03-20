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
                    <p id="productName" class="product-name">商品名がここに入ります</p> <!-- 仮のデータ -->
                    <label for="brandName">ブランド名</label>
                    <p id="brandName" class="brand-name">ブランド名がここに入ります</p> <!-- 仮のデータ -->
                </div>
                <!-- 金額（税込み） -->
                <div class="form-group mb-3">
                    <label for="price">金額（税込み）</label>
                    <p id="price">￥5000</p> <!-- 仮のデータ -->
                </div>
                <!-- いいね・コメントアイコンの追加 -->
                <div class="form-group mb-3 d-flex justify-content-between align-items-center">
                    <!-- 左側（いいねアイコンとコメントアイコン） -->
                    <div class="d-flex justify-content-between">
                        <!-- いいねボタンのセクション -->
                        <div class="d-flex flex-column align-items-center me-3">
                            <button type="submit" class="btn icon-btn d-flex flex-column align-items-center">
                                <img src="{{ asset('images/星アイコン8.png') }}" alt="いいね" class="icon me-2">
                                <!-- いいね数字 -->
                                <span class="icon-number">2</span>
                            </button>
                        </div>
                        <!-- コメントアイコンのセクション -->
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('images/ふきだしのアイコン.png') }}" alt="コメント" class="icon me-2">
                            <!-- コメント数字 -->
                            <span class="icon-number">4</span>
                        </div>
                    </div>
                    <!-- 右側（空白部分や他のコンテンツを追加する場所） -->
                    <div class="d-flex">
                        <!-- 右側のコンテンツ（必要に応じて追加） -->
                    </div>
                </div>
            </div>
            <!-- 購入手続きボタン -->
            <div class="form-group mb-3">
                <button class="btn btn-secondary w-100">購入手続きへ</button>
            </div>
            <!-- 商品説明 -->
            <div class="section-title-details">
                <span>商品説明</span>
            </div>
            <!-- カラー -->
            <div class="form-group mb-3">
                <label for="color">カラー:</label>
                <span id="color">シルバー</span> <!-- 仮のデータ -->
            </div>
            <!-- 商品の状態 -->
            <div class="form-group mb-3">
                <label for="condition">商品の状態</label>
                <p id="condition">新品</p> <!-- 仮のデータ -->
                <p class="text-muted">商品の状態は良好です。傷もありません。</p> <!-- 商品状態の説明 -->
            </div>
            <div class="form-group mb-3">
                <!-- 商品説明のボトム -->
                <p class="shipping-info">購入後、即発送いたします。</p>
            </div>
            <!-- 商品の情報 -->
            <div class="section-title-details">
                <span>商品の情報</span>
            </div>
            <!-- カテゴリー -->
            <div class="form-group mb-3">
                <label for="category">カテゴリー</label>
                <p id="category">ファッション</p> <!-- 仮のデータ -->
            </div>

            <!-- コメント -->
            <div class="comment-section-title">
                <span>コメント(1)</span>
            </div>

            <!-- admin画像の表示窓 -->
            <div class="form-group mb-3">
                <div class="image-display-box">
                    <img src="{{ asset('storage/images/三毛猫のアイコン.jpg') }}" alt="admin画像" id="profile-picture">
                    <label for="imageDisplay">admin</label>
                </div>
            </div>

            <!-- コメントが表示されるボックス -->
            <div class="form-group mb-3">
                <div id="admin-commentBox" class="admin-commentBox">
                    <!-- ここに既存のコメントが表示されます -->
                    こちらにコメント内容が入ります。
                </div>
            </div>

            <!-- コメントを入力するボックス -->
            <div class="form-group mb-3">
                <label for="commentBox">商品へのコメント</label>
                <textarea id="commentBox" class="form-control" rows="3"></textarea>
            </div>

            <!-- コメント送信ボタン -->
            <div class="form-group mb-3">
                <button id="submitComment" class="btn btn-secondary w-100">コメントを送信する</button>
            </div>
        </div>

    </div>
</div>
</div>
@endsection