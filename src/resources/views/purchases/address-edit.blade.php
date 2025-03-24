@extends('layouts.header')

@section('title', '送付先住所変更')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/purchases/address-edit.css') }}">
@endpush

@section('content')
<div class="container-fluid d-flex justify-content-center">
    <!-- メインコンテンツ -->
    <div class="main-content">
        <!-- タイトルセクション -->
        <h2 class="text-center mb-4">住所の変更</h2>

        <!-- 住所変更フォームセクション -->
        <form method="POST" action="#">
            @csrf
            <!-- 郵便番号セクション -->
            <div class="form-section mb-4">
                <label for="postcode" class="form-label">郵便番号</label>
                <input type="text" class="form-control" id="postcode" name="postcode" required>
            </div>
            <!-- 住所セクション -->
            <div class="form-section mb-4">
                <label for="address" class="form-label">住所</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <!-- 建物名セクション -->
            <div class="form-section mb-4">
                <label for="build" class="form-label">建物名</label>
                <input type="text" class="form-control" id="build" name="build">
            </div>
            <!-- 更新ボタンセクション -->
            <div class="form-section mb-4 mt-5">
                <button type="submit" class="btn-update-address w-100">更新する</button>
            </div>
        </form>
    </div>
</div>
@endsection