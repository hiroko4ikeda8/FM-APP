@extends('layouts.header-basic')

@section('title', '商品購入')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/purchases/purchase.css') }}">
@endpush

@section('content')
<div class="main-content p-4 pt-5">
    <!-- 商品画像セクション -->
    <div class="row mb-4">
        <!-- 左側 2/3 -->
        <div class="col-md-8">
            <div class="row">
                <!-- 左側 1/4 画像 -->
                <div class="col-md-3">
                    <div class="img-container" style="margin-bottom: 20px;">
                        <img src="{{ asset($item->image_path) }}" alt="商品画像">
                    </div>
                </div>
                <!-- 左側 2/4 商品名と金額 -->
                <div class="col-md-6">
                    <h4 style="font-size: 30px;">{{ $item->name }}</h4>
                    <p style="font-size: 30px;">
                        <span style="font-weight: normal; font-size: 25px;">¥</span>
                        <span class="fw-bold">{{ number_format($item->price) }}</span>
                    </p>
                </div>
            </div>
            <hr style="width: 98%; border-top: 2px solid black;">
        </div>
        <!-- 右側 1/3 -->
        <div class="col-md-4">
            <!-- テーブル -->
            <table class="table table-bordered" style="border: 1px solid black;">
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-center w-50 pt-4 label-text">商品代金</div>
                                <div class="text-center w-50 pt-4 price-value">
                                    <span style="margin-right: 4px;">¥</span>{{ number_format($item->price) }}
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
        <form method="POST" action="{{ route('purchase.confirm', ['item' => $item->id]) }}">
            @csrf
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
                            <select class="form-select custom-select" id="paymentMethod" name="payment_method"
                                style="border: 1px solid #5f5f5f; padding-top: 4px; padding-bottom: 4px; font-size: 14px;">
                                <option value="" selected hidden>選択してください</option>
                                <option value="credit_card">コンビニ払い</option>
                                <option value="convenience_store">カード支払い</option>
                            </select>
                        </div>
                    </div>
                    <hr style="border-top: 2px solid black;">
                </div>
                <!-- 右側1/3：購入ボタン -->
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center" style="height: 80%;">
                        <button class="btn btn-purchase w-100" sstyle="/* position: relative; left: 5%; */">購入する</button>
                    </div>
                </div>
            </div>
        </form>
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
                    <a href="{{ url('/purchase/address/' . $item->id) }}" class="text-primary" style="text-decoration: none;">変更する</a>
                </div>
            </div>
            <!-- 右側（1/2）：空欄 -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="text-start">
                    @if ($shippingAddress)
                    <p><strong>〒</strong> {{ $shippingAddress->postal_code }}</p>
                    <p>{{ $shippingAddress->address }} {{ $shippingAddress->building_name }}</p>
                    <!-- hidden で住所IDを送信 -->
                    <input type="hidden" name="shipping_address_id" value="{{ $shippingAddress->id }}">
                    @else
                    <p>住所が登録されていません。</p>
                    @endif
                </div>
            </div>
            <hr style="border-top: 2px solid black;">
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentSelect = document.getElementById('paymentMethod');
        const paymentDisplay = document.querySelector('.payment-method');

        paymentSelect.addEventListener('change', function() {
            const selectedOption = paymentSelect.options[paymentSelect.selectedIndex].text;
            paymentDisplay.textContent = selectedOption;
        });
    });
</script>