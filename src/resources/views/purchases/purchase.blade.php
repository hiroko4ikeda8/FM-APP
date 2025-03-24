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
            <hr>
        </div>

        <!-- 右側 1/3 -->
        <div class="col-md-4">
            <!-- テーブル -->
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>商品代金 ￥47,000</td>
                    </tr>
                    <tr>
                        <td>支払い方法 コンビニ払い</td>
                    </tr>
                </tbody>
            </table>
        </div>
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
            <div class="row">
                <div class="col-md-6 d-flex justify-content-end align-items-center">
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
        <div class="col-md-4 d-flex justify-content-center align-items-center" style="height: 100%;">
            <button class="btn btn-purchase w-100">購入する</button>
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
                <!-- 右側は中央にテキストを配置 -->
                <div class="text-start">
                    <p><strong>〒</strong> XXX-YYYY</p>
                    <p>ここには住所と建物が入ります</p>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection