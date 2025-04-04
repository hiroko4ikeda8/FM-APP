<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フリマアプリ - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Inter フォントを読み込む -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header-basic.css') }}">
    @stack('styles') <!-- ここに @push('styles') で追加されたコンテンツが挿入されます -->
</head>

<body>
    <header class="bg-dark p-3">
        <div class="container d-flex justify-content-between align-items-center ">
            <!-- 左側：ロゴ（完全中央配置） -->
            <div class="d-flex align-items-center justify-content-center" style="width: 150px; height: 100%;">
                <a href="{{ url('/') }}" class="header-logo d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/logo.svg') }}" alt="ロゴ" height="30">
                </a>
            </div>

            <!-- 中央：検索フォーム -->
            <div class="d-flex align-items-center justify-content-start mx-3" style="width: 500px;">
                <!--<form action="{{ route('items.search') }}" method="GET" style="width: 100%;">
                    <input type="text" name="query" class="form-control" style="width: 100%;" placeholder="なにをお探しですか？" value="{{ request()->query('query') }}">
                </form> -->
                <form action="{{ route('items.index') }}" method="GET" style="width: 100%;">
                    <input type="text" name="query" class="form-control" placeholder="なにをお探しですか？"
                        value="{{ request()->query('query') ?? session('search_query') }}">
                </form>

            </div>

            <!-- CSSでプレースホルダーテキストを太字に設定 -->
            <style>
                .form-control::placeholder {
                    font-weight: 700;
                    /* より明確に太字を指定 */
                }
            </style>

            <!-- 右側：ナビゲーション -->
            <div class="d-flex align-items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none text-white me-3" aria-label="ログアウト">ログアウト</button>
                </form>
                <a href="{{ url('/mypage') }}" class="me-3 text-decoration-none text-white" aria-label="マイページ">マイページ</a>
                <a href="{{ url('/sell') }}" class="btn btn-light text-dark" aria-label="出品">出品</a>
            </div>
        </div>
    </header>

    <main class="container mt-4">
        @yield('content') <!-- ここに子テンプレートのコンテンツが挿入されます -->
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>