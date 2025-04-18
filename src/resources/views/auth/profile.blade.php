@extends('layouts.header-basic')

@section('title', 'プロフィール')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/profile.css') }}">

@endpush

@section('content')
<div class="container mt-5">
    <!-- プロフィール情報 -->
    <div class="row mb-3 align-items-center">
        <!-- 左側: アイコン + ユーザー名 -->
        <section class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="me-3">
                <img src="{{ asset('storage/images/三毛猫のアイコン.jpg') }}" alt="アイコン" class="img-fluid" id="profile-picture">
            </div>
            <h3 class="fw-bold mb-0">ユーザー名</h3> <!-- アイコンの右側に配置 -->
        </section>
        <!-- 右側: プロフィール編集ボタン -->
        <section class="col-md-6 d-flex justify-content-center">
            <a href="/mypage/profile" class="btn btn-profile-edit fw-bold px-4 w-50 fs-5">プロフィールを編集</a>
        </section>
    </div>
</div>

<div class="main-content">
    <nav class="nav-container border-bottom pb-2 mb-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active fw-bold" id="sellTab" data-bs-toggle="pill" href="#sell">出品した商品</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold" id="buyTab" data-bs-toggle="pill" href="#buy">購入した商品</a>
            </li>
        </ul>
    </nav>
    <!-- プロフィール画面のタブ部分 -->
    <div class="tab-content mt-3">
        <div id="buy" class="tab-pane fade {{ request('tab') === 'buy' ? 'show active' : '' }}">
            <div class="item-gallery">
                @if ($purchasedItems->isNotEmpty())
                <div class="row">
                    @foreach ($purchasedItems as $item)
                    <div class="col-md-3 d-flex justify-content-center mb-4">
                        <div class="item text-center">
                            <a href="{{ route('item.show', $item->id) }}">
                                <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" class="img-fluid profile-item-image">
                                <p class="item-name">{{ $item->name }}</p>
                            </a>
                            <p class="sold-label">Purchased</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-center">購入履歴はありません。</p>
                @endif
            </div>
        </div>

        <div id="sell" class="tab-pane fade {{ request('tab') === 'sell' ? 'show active' : '' }}">
            <div class="item-gallery">
                @if ($soldItems->isNotEmpty())
                <div class="row">
                    @foreach ($soldItems as $item)
                    <div class="col-md-3 d-flex justify-content-center mb-4">
                        <div class="item text-center">
                            <a href="{{ route('item.show', $item->id) }}">
                                <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" class="img-fluid profile-item-image">
                                <p class="item-name">{{ $item->name }}</p>
                            </a>
                            @if($item->purchased)
                            <p class="sold-label">Sold</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-center">出品履歴はありません。</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection