@extends('layouts.app')

@section('title', '商品購入')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/purchases/order.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-basic.css') }}">
@endpush

@section('content')
<div class="main-content">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- 左側: 商品画像 -->
            <div class="col-md-6">
                <div class="product-image">
                    <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="商品画像" class="item-image">
                </div>
            </div>

            <!-- 右側: 商品購入フォーム -->
            <div class="col-md-6">
                <div class="item-details">
                    <!-- 商品名 -->
                    <div class="form-group mb-3">
                        <label for="productName">商品名</label>
                        <p id="productName" class="product-name">商品名がここに入ります</p>
                    </div>
                    <!-- ブランド名 -->
                    <div class="form-group mb-3">
                        <label for="brandName">ブランド名</label>
                        <p id="brandName" class="brand-name">ブランド名がここに入ります</p>
                    </div>
                    <!-- 金額（税込み） -->
                    <div class="form-group mb-3">
                        <label for="price">金額（税込み）</label>
                        <p id="price">￥5000</p>
                    </div>
                    <!-- 購入手続きボタン -->
                    <div class="form-group mb-3">
                        <button class="btn btn-secondary w-100">購入手続きへ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection