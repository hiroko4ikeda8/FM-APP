@extends('layouts.app')

@section('title', '商品出品')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/create.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-basic.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- 左側の空白部分 -->
        <div class="col-3"></div>
        <!-- 中央のメインコンテンツ -->
        <div class="col-6">
            <div class="main-content">
                <!-- 商品出品のコンテンツ -->
                <h2 class="text-center mb-4">商品出品</h2>
                <form>
                    <!-- 商品画像セクション -->
                    <section class="product-image mb-5">
                        <div class="form-group">
                            <label for="productImage">商品画像</label>
                            <div class="product-image-box">
                                <label for="productImage" class="btn-secondary">画像を選択する</label>
                                <input type="file" class="form-control" id="productImage" style="display: none;">
                            </div>
                        </div>
                    </section>

                    <!-- 商品の詳細セクション -->
                    <section class="product-details mb-5">
                        <div class="section-title-details">
                            <span style="font-weight: bold;">商品の詳細</span>
                        </div>
                        <hr>
                        <!-- カテゴリー -->
                        <div class="form-group mb-3">
                            <label for="category">カテゴリー</label>
                            <div class="category-buttons">
                                <button type="button" class="category-btn">ファッション</button>
                                <button type="button" class="category-btn">家電</button>
                                <button type="button" class="category-btn">インテリア</button>
                                <button type="button" class="category-btn">レディース</button>
                                <button type="button" class="category-btn">メンズ</button>
                                <button type="button" class="category-btn">コスメ</button>
                                <button type="button" class="category-btn">本</button>
                                <button type="button" class="category-btn">ゲーム</button>
                                <button type="button" class="category-btn">スポーツ</button>
                                <button type="button" class="category-btn">キッチン</button>
                                <button type="button" class="category-btn">ハンドメイド</button>
                                <button type="button" class="category-btn">アクセサリー</button>
                                <button type="button" class="category-btn">おもちゃ</button>
                                <button type="button" class="category-btn">ベビー・キッズ</button>
                            </div>
                            </select>
                        </div>
                        <!-- 商品の状態 -->
                        <div class="form-group">
                            <label for="condition">商品の状態</label>
                            <select class="form-select" id="condition">
                                <option selected>選択してください</option>
                                <option value="good">良好</option>
                                <option value="almost_new">目立った傷や汚れなし</option>
                                <option value="slightly_used">やや傷や汚れあり</option>
                                <option value="poor_condition">状態が悪い</option>
                            </select>
                        </div>
                    </section>

                    <!-- 商品名と説明セクション -->
                    <section class="product-info mb-5">
                        <div class="section-title-description">
                            <span style="font-weight: bold;">商品名と説明</span>
                        </div>
                        <hr>
                        <!-- 商品名 -->
                        <div class="form-group mb-3">
                            <label for="productName">商品名</label>
                            <input type="text" class="form-control" id="productName">
                        </div>
                        <!-- ブランド名 -->
                        <div class="form-group mb-3">
                            <label for="brandName">ブランド名</label>
                            <input type="text" class="form-control" id="brandName">
                        </div>
                        <!-- 商品説明 -->
                        <div class="form-group mb-3">
                            <label for="description">商品の説明</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <!-- 販売価格 -->
                        <div class="form-group">
                            <label for="price">販売価格</label>
                            <div class="input-group">
                                <span class="input-group-text">￥</span>
                                <input type="text" class="form-control" id="price">
                            </div>
                        </div>
                    </section>

                    <!-- 出品ボタンセクション -->
                    <section class="submit-button">
                        <button type="submit" class="btn btn-Exhibit w-100 mt-3">出品する</button>
                    </section>
                </form>
            </div>
        </div>

        <!-- 右側の空白部分 -->
        <div class="col-3"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection