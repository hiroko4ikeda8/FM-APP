@extends('layouts.app')

@section('title', '送付先住所変更')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/purchases/address-edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-basic.css') }}">
@endpush

@section('content')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">送付先住所変更</h2>
            <form method="POST" action="#">
                @csrf
                <div class="mb-3">
                    <label for="postal_code" class="form-label">郵便番号</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">住所</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="building_name" class="form-label">建物名</label>
                    <input type="text" class="form-control" id="building_name" name="building_name">
                </div>
                <button type="submit" class="btn btn-primary w-100">更新する</button>
            </form>
        </div>
    </div>
    <!-- 送付先住所変更のコンテンツ -->
</div>
@endsection