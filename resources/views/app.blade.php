<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!--.envファイルのapp.nameの値を参考にし、もし設定されていなければ'Vue Laravel SPA'を利用する。-->
    <title>{{ config('app.name', 'Vue Laravel SPA') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <!--どんなリクエストが飛んできても対応していたルーターweb.phpはここにくる。
    ここでは以下３つのコンポーネントが存在している。これに対しtapp.jsでいい感じに処理して、表示を作成している。-->
    <header-component></header-component>
    <example-component></example-component>
    
    <router-view></router-view>
</div>
<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}" defer></script>
</body>
</html>