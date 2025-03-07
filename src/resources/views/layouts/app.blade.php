<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フリマアプリ - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles') <!-- ここに @push('styles') で追加されたコンテンツが挿入されます -->
</head>

<body>

    <header class="bg-dark p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- ロゴ -->
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="ロゴ" height="30">
            </a>

            <!-- 検索フォーム -->
            <input type="text" class="form-control w-50 mx-3" placeholder="なにをお探しですか？">

            <!-- ナビゲーション -->
            <nav class="d-flex">
                <a href="{{ route('logout') }}" class="me-3 text-decoration-none text-white" aria-label="ログアウト">ログアウト</a>
                <a href="{{ url('/mypage') }}" class="me-3 text-decoration-none text-white" aria-label="マイページ">マイページ</a>
                <a href="{{ url('/create') }}" class="btn btn-light text-dark" aria-label="出品">出品</a>
            </nav>
        </div>
    </header>

    <main class="container mt-4">
        @yield('content') <!-- ここに子テンプレートのコンテンツが挿入されます -->
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>