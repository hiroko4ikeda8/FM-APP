@extends('layouts.header-basic')

@section('title', 'プロフィール設定')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/edit-profile.css') }}">
@endpush

@section('content')
<div class="page-container">
    <!-- メインコンテンツ -->
    <div class="content-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8"> <!-- Bootstrapのcol-md-8で幅を設定 -->
                    <div class="profile-box">
                        <!-- プロフィール設定タイトルセクション -->
                        <div class="section-title mb-4 text-center">
                            <h2 class="fw-bold">プロフィール設定</h2> <!-- 太字に変更 -->
                        </div>
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- アイコンの表示セクション -->
                            <div class="row mb-4">
                                <!-- 左側：画像とボタン -->
                                <div class="col-md-6 d-flex align-items-center justify-content-between">
                                    <div>
                                        <img src="{{ asset('storage/images/三毛猫のアイコン.jpg') }}" alt="アイコン" class="img-fluid" id="profile-picture">
                                    </div>
                                    <div class="ms-3"> <!-- ボタンと画像の間に左側のマージンを追加 -->
                                        <label for="profilePicture" class="btn btn-secondary fw-bold">画像を選択する</label>
                                        <input type="file" class="form-control d-none" id="profilePicture" name="profile_picture">
                                    </div>
                                </div>

                                <!-- 右側：フォームの残り部分（空でも可） -->
                                <div class="col-md-6">
                                    <!-- 他のフォームフィールドがここに配置されます -->
                                </div>
                            </div>

                            <!-- ユーザー名セクション -->
                            <div class="mb-4">
                                <label for="username" class="form-label fw-bold">ユーザー名</label> <!-- 太字に変更 -->
                                <input type="text" class="form-control" id="username" name="username" value="ユーザー名のサンプル">
                            </div>

                            <!-- 郵便番号セクション -->
                            <div class="mb-4">
                                <label for="postalCode" class="form-label fw-bold">郵便番号</label> <!-- 太字に変更 -->
                                <input type="text" class="form-control" id="postalCode" name="postal_code" value="123-4567">
                            </div>

                            <!-- 住所セクション -->
                            <div class="mb-4">
                                <label for="address" class="form-label fw-bold">住所</label> <!-- 太字に変更 -->
                                <input type="text" class="form-control" id="address" name="address" value="東京都渋谷区1-2-3">
                            </div>

                            <!-- 建物名セクション -->
                            <div class="mb-4">
                                <label for="buildingName" class="form-label fw-bold">建物名</label> <!-- 太字に変更 -->
                                <input type="text" class="form-control" id="buildingName" name="building_name" value="渋谷ビル101号">
                            </div>

                            <!-- 更新するボタンセクション -->
                            <div class="mb-4 pt-3"> <!-- pt-3 を追加して上にパディングを設定 -->
                                <button type="submit" class="btn btn-update-profile w-100">更新する</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- フッターエリア（何もない部分） -->
    <div class="footer-container"></div>
</div>
@endsection