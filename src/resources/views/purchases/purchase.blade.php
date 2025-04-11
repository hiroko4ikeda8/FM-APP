@extends('layouts.header-basic')

@section('title', '商品購入')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/purchases/purchase.css') }}">
@endpush

@section('content')
<div class="main-content p-4">
    <!-- 商品画像セクション -->
    <div class="row mb-4">
        <!-- 左側 2/3 -->
        <div class="col-md-8">
            <div class="row">
                <!-- 左側 1/4 画像 -->
                <div class="col-md-3">
                    <div class="img-container">
                        <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="商品画像">
                    </div>
                </div>
                <!-- 左側 2/4 商品名と金額 -->
                <div class="col-md-6">
                    <h4>Armani Mens Clock</h4>
                    <p>￥47,000</p>
                </div>
            </div>
            <hr style="width: 98%; border-top: 1px solid black;">
        </div>
        <!-- 右側 1/3 -->
        <div class="col-md-4">
            <!-- テーブル -->
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-center w-50 pt-4 label-text">商品代金</div>
                                <div class="text-center w-50 pt-4 price-value">
                                    <span style="margin-right: 4px;">¥</span>47,000
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-center w-50 pt-4 label-text">支払い方法</div>
                                <div class="text-center w-50 pt-4 payment-method">コンビニ払い</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- 支払い方法セクション -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="row">
                    <!-- 左側（1/2）：支払い方法タイトル -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label for="paymentMethod" class="fw-bold">支払い方法</label>
                    </div>
                </div>
                <!-- 右側（1/2）：支払い方法選択 -->
                <div class="row mt-4">
                    <div class="col-md-4 d-flex align-items-center" style="margin-left: 5%; margin-bottom: 35px;">
                        <select class="form-select" id="paymentMethod">
                            <option value="" selected disabled>選択してください</option>
                            <option value="credit_card">コンビニ払い</option>
                            <option value="convenience_store">カード支払い</option>
                        </select>
                    </div>
                </div>
                <hr>
            </div>
            <!-- 右側1/3：購入ボタン -->
            <div class="col-md-4">
                <div class="d-flex justify-content-center align-items-center" style="height: 80%;">
                    <button class="btn btn-purchase w-100" style="position: relative; left: 5%;">購入する</button>
                </div>
            </div>
        </div>
        <!-- 配送先セクション -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="row">
                    <!-- 左側（1/2）：配送先タイトル -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label for="shipping-info" class="fw-bold">配送先</label>
                    </div>
                    <!-- 右側（1/2）：変更リンク -->
                    <div class="col-md-6 text-end">
                        <a href="{{ url('/purchase/address/1') }}" class="text-primary" style="text-decoration: none;">変更する</a>
                    </div>
                </div>
                <!-- 右側（1/2）：空欄 -->
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="text-start">
                        @if ($shippingAddress)
                        <p><strong>〒</strong> {{ $shippingAddress->postal_code }}</p>
                        <p>{{ $shippingAddress->address }} {{ $shippingAddress->building_name }}</p>
                        @else
                        <p>住所が登録されていません。</p>
                        @endif
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    @endsection