@extends('layouts.header')

@section('title', '送付先住所変更')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/purchases/address-edit.css') }}">
@endpush

@section('content')
<div class="row justify-content-center">
    <!-- 幅を調整したフォームの配置 -->
    <div class="col-12 col-md-6 col-lg-6">
        <h2 class="text-center mb-4">住所の変更</h2>
        <form method="POST" action="#">
            @csrf

            <!-- 郵便番号セクション -->
            <div class="mb-3">
                <label for="postal_code" class="form-label">郵便番号</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" required>
            </div>

            <!-- 住所セクション -->
            <div class="mb-3">
                <label for="address" class="form-label">住所</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <!-- 建物名セクション -->
            <div class="mb-3">
                <label for="building_name" class="form-label">建物名</label>
                <input type="text" class="form-control" id="building_name" name="building_name">
            </div>

            <!-- 更新ボタン -->
            <button type="submit" class="btn btn-update-address w-100">更新する</button>
        </form>
    </div>
</div>
@endsection