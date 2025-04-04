@extends('layouts.header-basic')

@section('title', '商品一覧')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/index.css') }}">
@endpush

@section('content')
<div class="main-content ">
    <!-- タブリンク -->
    <nav class="nav-container">
        <div class="d-flex justify-con p-4tent-between">
            <!-- 左側：おすすめ・マイリストのテキストリンク -->
            <div class="w-25 d-flex justify-content-end text-end">
                <ul class="nav nav-pills">
                    <li class="nav-item p-2">
                        <a class="nav-link active" id="recommendTab" data-bs-toggle="pill" href="#recommend">おすすめ</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" id="mylistTab" data-bs-toggle="pill" href="#mylist">マイリスト</a>
                    </li>
                </ul>
            </div>

            <!-- 中央：空のスペース -->
            <div class="w-25"></div>

            <!-- 右側：空のスペース -->
            <div class="w-25"></div>
        </div>
    </nav>
    <!-- タブ内容 -->
    <div class="tab-content mt-3">
        <!-- おすすめ商品 -->
        <div id="recommend" class="tab-pane fade show active">
            <div class="item-gallery">
                <div class="container">
                    <div class="row">
                        @if ($recommendItems->isNotEmpty())
                            <div id="recommend" class="tab-pane fade show active">
                                <div class="item-gallery">
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($recommendItems as $item)
                                            <div class="col-md-3 d-flex justify-content-center mb-4">
                                                <div class="item text-center">
                                                    <a href="{{ route('item.show', $item->id) }}">
                                                        <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" class="img-fluid item-image">
                                                        <p class="item-name">{{ $item->name }}</p>
                                                    </a>
                                                    @if($item->purchased)
                                                    <p class="sold-label">Sold</p>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <p class="text-center">該当商品が見つかりませんでした。</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- マイリスト商品 -->
    <div id="mylist" class="tab-pane fade">
        @auth
        <div class="item-gallery">
            <div class="row">
                @foreach(auth()->user()->likes as $item)
                <div class="col-md-3">
                    <div class="item text-center">
                        <a href="{{ route('item.show', $item->id) }}">
                            <img src="{{ asset('storage/images/' . $item->image_path) }}" alt="{{ $item->name }}" class="img-fluid fixed-size">
                            <p>{{ $item->name }}</p>
                        </a>
                        @if($item->purchased)
                        <p class="sold-label">Sold</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <p>ログインしていないため、マイリストを表示できません。</p>
        @endauth
    </div>
</div>

@endsection