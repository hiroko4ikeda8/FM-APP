@extends('layouts.header-basic')

@section('title', '商品詳細')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/show.css') }}">
@endpush

@section('content')
<div class="main-content">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- 左側: 商品画像 -->
            <div class="col-md-6">
                <div class="product-image position-relative">
                    @if ($isSold)
                    <!-- 商品が存在しない場合（SOLDを表示） -->
                    <div class="sold-overlay">
                        <span class="sold-text">SOLD</span>
                    </div>
                    @else
                    <!-- 通常の商品画像 -->
                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" class="img-fluid">
                    @endif
                </div>
            </div>

            <!-- 右側: 商品詳細フォーム -->
            <div class="col-md-6">
                <div class="item-details">
                    <!-- 商品名 -->
                    <div class="item-header mb-3">
                        <p id="productName" class="product-name">{{ $item->name }}</p> <!-- 商品名を動的に表示 -->
                        <label for="brandName">ブランド名</label>
                        <p id="brandName" class="brand-name">
                            {{ $item->brand_name }}
                        </p> <!-- ブランド名がnullの場合はフォールバック -->
                    </div>
                    <!-- 金額（税込み） -->
                    <div class="price-section mb-3">
                        <p id="price">
                            <span class="yen-symbol">￥</span>
                            <span class="price-amount">{{ number_format($item->price) }}</span>
                            <span class="tax-label">（税込）</span>
                        </p>
                    </div>

                    <!-- いいね・コメントアイコンの追加 -->
                    <div class="like-comment-section mb-3 d-flex justify-content-between align-items-center">
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
                <div class="purchase-section mb-3">
                    <a href="{{ route('purchase.show', $item->id) }}" class="btn btn-purchase w-100">購入手続きへ</a>
                </div>
                <!-- 商品説明 -->
                <div class="section-title-details">
                    <span>商品説明</span>
                </div>
                <!-- カラー -->
                <div class="color-section mb-3">
                    <label for="color">カラー:</label>
                    <span id="color">シルバー</span> <!-- 仮のデータ -->
                </div>

                <div class="shipping-info-section mb-3">
                    <!-- 商品状態の説明 -->
                    <p class="text-muted">商品の状態は良好です。傷もありません。</p>
                    <!-- 商品説明のボトム -->
                    <p class="shipping-info">購入後、即発送いたします。</p>
                </div>
                <!-- 商品の情報 -->
                <div class="section-title-details">
                    <span>商品の情報</span>
                </div>
                <!-- カテゴリー -->
                <div class="info-section mb-3">
                    <label for="category">カテゴリー</label>
                    <div id="category">
                        @forelse ($item->categories as $category)
                        <span class="category-badge">{{ $category->name }}</span>
                        @empty
                        <span>未設定</span>
                        @endforelse
                    </div>
                </div>
                <!-- 商品の状態 -->
                <div class="condition-section mb-3">
                    <label for="condition">商品の状態</label>
                    <span id="condition">良好</span> <!-- 仮のデータ -->
                </div>
                <!-- コメント -->
                <div class="comment-section-title">
                    <span>コメント({{ $item->comments->count() }})</span>
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
                        @foreach ($item->comments as $comment)
                        <p>{{ $comment->user->name }}: {{ $comment->content }}</p>
                        @endforeach
                    </div>
                </div>

                <!-- コメント入力フォーム -->
                <form action="{{ route('comment.store', $item->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="commentBox">商品へのコメント</label>
                        <textarea id="commentBox" name="comment" class="form-control" rows="3" required></textarea>
                    </div>

                    <!-- コメント送信ボタン -->
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-comment-submit w-100">コメントを送信する</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection