@extends('layouts.app')

@section('title', '商品購入')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/purchases/order.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-basic.css') }}">
@endpush

@section('content')
<div class="main-content">
    <!-- 商品画像セクション -->
    <div class="row mb-4">
        <!-- 左側 2/3 -->
        <div class="col-md-8">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="商品画像" style="width: 200px; height: 200px; object-fit: cover;">
            </div>
        </div>

        <!-- 右側 1/3 -->
        <div class="col-md-4">
            <h5 class="text-center">その他情報</h5>
            <p class="text-center">ここに関連情報を記載できます。</p>
        </div>
    </div>

    <!-- 支払方法セクション -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h5 class="text-center">支払方法</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>支払い方法</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>クレジットカード</td>
                        <td>カード番号、期限など</td>
                    </tr>
                    <tr>
                        <td>コンビニ払い</td>
                        <td>支払い番号を発行</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- 配送先セクション -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h5 class="text-center">配送先</h5>
            <form>
                <div class="form-group mb-3">
                    <label for="address">住所</label>
                    <input type="text" class="form-control" id="address" placeholder="住所を入力">
                </div>
                <div class="form-group mb-3">
                    <label for="phone">電話番号</label>
                    <input type="text" class="form-control" id="phone" placeholder="電話番号を入力">
                </div>
                <button type="submit" class="btn btn-primary w-100">配送先を保存</button>
            </form>
        </div>
    </div>
</div>
@endsection