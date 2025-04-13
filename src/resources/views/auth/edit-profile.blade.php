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
                                        <img src="{{ asset('storage/images/' . ($user->avatar ?? 'default-icon.jpg')) }}" alt="アイコン" class="img-fluid" id="avatar-preview">
                                    </div>
                                    <div class="ms-3"> <!-- ボタンと画像の間に左側のマージンを追加 -->
                                        <label for="avatar" class="btn btn-secondary fw-bold">画像を選択する</label>
                                        <input type="file" class="form-control d-none" id="avatar" name="avatar">
                                    </div>
                                </div>

                                <!-- 右側：フォームの残り部分（空でも可） -->
                                <div class="col-md-6">
                                    <!-- 他のフォームフィールドがここに配置されます -->
                                </div>
                            </div>
                            <!-- 画像エラー表示 -->
                            @error('avatar')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <!-- ユーザー名セクション -->
                            <div class="mb-4">
                                <label for="username" class="form-label fw-bold">ユーザー名</label> <!-- 太字に変更 -->
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username ?? '') }}">
                                @error('username')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- 郵便番号セクション -->
                            <div class="mb-4">
                                <label for="postalCode" class="form-label fw-bold">郵便番号</label> <!-- 太字に変更 -->
                                <input type="text" class="form-control" id="postalCode" name="postal_code" value="{{ old('postal_code', $user->postal_code ?? '') }}">
                                @error('postal_code')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- 住所セクション -->
                            <div class="mb-4">
                                <label for="address" class="form-label fw-bold">住所</label> <!-- 太字に変更 -->
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address ?? '') }}">
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- 建物名セクション -->
                            <div class="mb-4">
                                <label for="buildingName" class="form-label fw-bold">建物名</label> <!-- 太字に変更 -->
                                <input type="text" class="form-control" id="buildingName" name="building_name" value="{{ old('building_name', $user->building_name ?? '') }}">
                                @error('buildingName')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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
<script>
    document.getElementById('avatar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('avatar-preview').src = event.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>