@extends('layouts.header')

@section('title', 'プロフィール設定')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/edit-profile.css') }}">
<style>
    .page-container {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    .content-container {
        flex: 2;
        /* 2/3 の高さ */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .footer-container {
        flex: 1;
        /* 1/3 の高さ */
    }

    .profile-box {
        max-width: 600px;
        width: 100%;
    }
</style>
@endpush

@section('content')
<div class="page-container">
    <!-- メインコンテンツ -->
    <div class="content-container">
        <div class="profile-box">
            <h2>プロフィール設定</h2>
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <!-- アイコンの表示 -->
                    <div class="col-md-6">
                        <img src="{{ asset('storage/images/三毛猫のアイコン.jpg') }}" alt="アイコン" class="img-fluid" id="profile-picture">
                    </div>
                    <div class="col-md-6">
                        <label for="profilePicture" class="btn btn-secondary">画像を選択する</label>
                        <input type="file" class="form-control d-none" id="profilePicture" name="profile_picture">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">ユーザー名</label>
                    <input type="text" class="form-control" id="username" name="username" value="ユーザー名のサンプル">
                </div>

                <div class="mb-3">
                    <label for="postalCode" class="form-label">郵便番号</label>
                    <input type="text" class="form-control" id="postalCode" name="postal_code" value="123-4567">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">住所</label>
                    <input type="text" class="form-control" id="address" name="address" value="東京都渋谷区1-2-3">
                </div>

                <div class="mb-3">
                    <label for="buildingName" class="form-label">建物名</label>
                    <input type="text" class="form-control" id="buildingName" name="building_name" value="渋谷ビル101号">
                </div>

                <button type="submit" class="btn btn-update-profile">更新する</button>
            </form>
        </div>
    </div>

    <!-- フッターエリア（何もない部分） -->
    <div class="footer-container"></div>
</div>
@endsection