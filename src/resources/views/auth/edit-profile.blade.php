@extends('layouts.app')

@section('title', 'プロフィール設定')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/edit-profile.css') }}">
@endpush

@section('content')
<div class="container mt-5">
    <h2>プロフィール設定</h2>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- PUTリクエストを使う場合 -->

        <div class="row mb-3">
            <!-- アイコンの表示 -->
            <div class="col-md-6">
                <!-- 静的なアイコン画像 -->
                <img src="{{ asset('storage/images/三毛猫のアイコン.jpg') }}" alt="アイコン" class="img-fluid" id="profile-picture">
            </div>
            <div class="col-md-6">
                <!-- 画像選択ボタン -->
                <label for="profilePicture" class="btn btn-secondary">画像を選択する</label>
                <input type="file" class="form-control d-none" id="profilePicture" name="profile_picture">
            </div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">ユーザー名</label>
            <!-- 静的なユーザー名 -->
            <input type="text" class="form-control" id="username" name="username" value="ユーザー名のサンプル">
        </div>

        <div class="mb-3">
            <label for="postalCode" class="form-label">郵便番号</label>
            <!-- 静的な郵便番号 -->
            <input type="text" class="form-control" id="postalCode" name="postal_code" value="123-4567">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">住所</label>
            <!-- 静的な住所 -->
            <input type="text" class="form-control" id="address" name="address" value="東京都渋谷区1-2-3">
        </div>

        <div class="mb-3">
            <label for="buildingName" class="form-label">建物名</label>
            <!-- 静的な建物名 -->
            <input type="text" class="form-control" id="buildingName" name="building_name" value="渋谷ビル101号">
        </div>

        <button type="submit" class="btn btn-primary">更新する</button>
    </form>
</div>
@endsection