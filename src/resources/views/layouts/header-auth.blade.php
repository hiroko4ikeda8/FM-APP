<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フリマアプリ - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Inter フォントを読み込む -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header-auth.css') }}">
    @stack('styles') <!-- ここに @push('styles') で追加されたコンテンツが挿入されます -->
</head>

<body>
    <header class="bg-dark p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="ロゴ" height="30">
            </a>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>