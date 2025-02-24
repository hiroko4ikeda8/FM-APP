@extends('layouts.app')

@section('title', '商品一覧')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/index.css') }}">
@endpush

@section('content')
<div class="main-content">
    <!-- 商品一覧のコンテンツ -->
    <h1>商品一覧</h1>
    <p>ここに商品一覧を表示</p>
</div>
@endsection
