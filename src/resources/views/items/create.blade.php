@extends('layouts.app')

@section('title', '商品出品')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/create.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-basic.css') }}">
@endpush

@section('content')
<div class="main-content">
    <!-- 商品出品のコンテンツ -->
    <div class="container">
        <h2 class="text-center">商品出品</h2>
        <form>
            <!-- 商品画像 -->
            <div class="form-group">
                <label for="productImage">商品画像</label>
                <input type="file" class="form-control" id="productImage">
            </div>
            <!-- 商品詳細のテキスト -->
            <div class="form-group">
                <span style="font-weight: bold;">商品の詳細</span>
            </div>
            <!-- アンダーライン -->
            <hr>
            <!-- カテゴリー -->
            <div class="form-group">
                <label for="category">カテゴリー</label>
                <select class="form-select" id="category">
                    <option selected>選択してください</option>
                    <option value="1">ファッション</option>
                    <option value="2">家電</option>
                    <option value="3">本・雑誌</option>
                </select>
            </div>
            <!-- 商品の状態 -->
            <div class="form-group">
                <label for="condition">商品の状態</label>
                <select class="form-select" id="condition">
                    <option selected>選択してください</option>
                    <option value="new">新品</option>
                    <option value="used">中古</option>
                </select>
            </div>
            <!-- 商品詳細のテキスト -->
            <div class="form-group">
                <span style="font-weight: bold;">商品名と説明</span>
            </div>
            <!-- アンダーライン -->
            <hr>
            <!-- 商品名 -->
            <div class="form-group">
                <label for="productName">商品名</label>
                <input type="text" class="form-control" id="productName">
            </div>
            <!-- ブランド名 -->
            <div class="form-group">
                <label for="brandName">ブランド名</label>
                <input type="text" class="form-control" id="brandName">
            </div>
            <!-- 商品説明 -->
            <div class="form-group">
                <label for="description">商品の説明</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>
            <!-- 販売価格 -->
            <div class="form-group">
                <label for="price">販売価格</label>
                <div class="input-group">
                    <span class="input-group-text">￥</span>
                    <input type="number" class="form-control" id="price">
                </div>
            </div>
            <!-- 出品ボタン -->
            <button type="submit" class="btn btn-Exhibit w-100 mt-3">出品する</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
@endsection