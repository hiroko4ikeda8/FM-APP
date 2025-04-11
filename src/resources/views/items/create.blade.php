@extends('layouts.header-basic')

@section('title', '商品出品')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/items/create.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- 左側の空白部分 -->
        <div class="col-3"></div>
        <!-- 中央のメインコンテンツ -->
        <div class="col-6">
            <div class="main-content">
                <!-- 商品出品のコンテンツ -->
                <h2 class="text-center mb-4">商品出品</h2>
                <form method="POST" action="{{ route('sell.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- 商品画像セクション -->
                    <section class="product-image mb-5">
                        <div class="form-group">
                            <label for="productImage">商品画像</label>
                            <div class="product-image-box" id="imagePreviewBox">
                                <!-- 画像プレビューを表示する領域 -->
                                <img id="previewImage" src="" alt="プレビュー画像" style="max-height: 100%; display: none;">
                                <label for="productImage" class="btn-secondary position-absolute">画像を選択する</label>
                                <input type="file" name="image" id="productImage" accept="image/*" style="display: none;">

                            </div>
                        </div>
                    </section>
                    <!-- 商品の詳細セクション -->
                    <section class="product-details mb-5">
                        <div class="section-title-details">
                            <span style="font-weight: bold;">商品の詳細</span>
                        </div>
                        <hr>
                        <!-- カテゴリー -->
                        <div class="form-group mb-3">
                            <label for="category">カテゴリー</label>
                            <div class="category-buttons">
                                @foreach($categories as $category) <!-- カテゴリーデータを動的に表示 -->
                                <button type="button" class="category-btn" data-id="{{ $category->id }}">{{ $category->name }}</button>
                                @endforeach
                            </div>
                            <!-- hidden input をここに設置（Blade内に仕込む）-->
                            <input type="hidden" name="categories[]" id="selectedCategories">
                        </div>
                        <!-- 商品の状態 -->
                        <div class="form-group">
                            <label for="condition">商品の状態</label>
                            <select class="form-select custom-select" id="condition"
                                style="border: 1px solid #5f5f5f; font-size: 14px;">
                                <option value="" selected hidden>選択してください</option>
                                @foreach ($conditions as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </section>
                    <!-- 商品名と説明セクション -->
                    <section class="product-info mb-5">
                        <div class="section-title-description">
                            <span style="font-weight: bold;">商品名と説明</span>
                        </div>
                        <hr>
                        <!-- 商品名 -->
                        <div class="form-group mb-3">
                            <label for="productName">商品名</label>
                            <input type="text" name="name" class="form-control" id="productName">
                        </div>
                        <!-- ブランド名 -->
                        <div class="form-group mb-3">
                            <label for="brandName">ブランド名</label>
                            <input type="text" name="brand" class="form-control" id="brandName">
                        </div>
                        <!-- 商品説明 -->
                        <div class="form-group mb-3">
                            <label for="description">商品の説明</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>
                        <!-- 販売価格 -->
                        <div class="form-group">
                            <label for="price">販売価格</label>
                            <div class="input-group">
                                <span class="input-group-text">￥</span>
                                <input type="text" name="price" class="form-control" id="price">
                            </div>
                        </div>
                    </section>

                    <!-- 出品ボタンセクション -->
                    <section class="submit-button">
                        <button type="submit" class="btn btn-create w-100 mt-3">出品する</button>
                    </section>
                </form>
            </div>
        </div>
        <!-- 右側の空白部分 -->
        <div class="col-3"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
<script>
    const selected = new Set();
    const buttons = document.querySelectorAll('.category-btn');
    const hiddenInput = document.getElementById('selectedCategories');

    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            const value = this.dataset.id;

            this.classList.toggle('selected');

            if (selected.has(value)) {
                selected.delete(value);
            } else {
                selected.add(value);
            }

            // hidden input の value を更新
            hiddenInput.value = Array.from(selected).join(',');
        });
    });

    // 画像プレビュー機能
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('productImage');
        const previewImage = document.getElementById('previewImage');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>