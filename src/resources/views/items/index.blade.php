@extends('layouts.app')

@section('title', '商品一覧')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/index.css') }}">
@endpush

@section('content')
<div class="main-content">
    <!-- 商品一覧のコンテンツ -->
    <h1>商品一覧</h1>
    <!-- ナビゲーションメニュー -->
    <nav class="nav-container border-bottom pb-2 mb-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" id="recommendTab" data-bs-toggle="pill" href="#recommend">おすすめ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mylistTab" data-bs-toggle="pill" href="#mylist">マイリスト</a>
            </li>
        </ul>
    </nav>

    <p>ここに商品一覧を表示</p>
    <!-- 商品表示 -->
    <div class="tab-content mt-3">
        <!-- おすすめ商品 -->
        <div id="recommend" class="tab-pane fade show active">
            <div class="items">
                @foreach ($items as $item)
                <div class="item">
                    <a href="{{ route('items.show', $item) }}">
                        <img src="{{ asset('images/sample.jpg') }}" alt="商品画像" class="img-fluid">
                        <p>{{ $item->name }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- マイリスト商品 -->
        <div id="mylist" class="tab-pane fade">
            <div class="items">
                <!-- マイリストの商品をここに追加 -->
            </div>
        </div>
    </div>
</div>
@endsection