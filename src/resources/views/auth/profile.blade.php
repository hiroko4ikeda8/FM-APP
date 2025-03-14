@extends('layouts.app')

@section('title', 'プロフィール設定')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/profile.css') }}">
@endpush

@section('content')
<div class="container mt-5">
    <h2>プロフィール設定</h2>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT') <!-- PUTリクエストを使う場合 -->

        <div class="row mb-3">
            <!-- アイコンの表示 -->
            <div class="col-md-6">
                <img src="{{ asset('images/default-avatar.jpg') }}" alt="アイコン" class="img-fluid" id="profile-picture">
            </div>
            <div class="col-md-6">
                <input type="file" class="form-control" id="profilePicture" name="profile_picture">
            </div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">ユーザー名</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
        </div>

        <div class="mb-3">
            <label for="postalCode" class="form-label">郵便番号</label>
            <input type="text" class="form-control" id="postalCode" name="postal_code" value="{{ old('postal_code') }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">住所</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
        </div>

        <div class="mb-3">
            <label for="buildingName" class="form-label">建物名</label>
            <input type="text" class="form-control" id="buildingName" name="building_name" value="{{ old('building_name') }}">
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection