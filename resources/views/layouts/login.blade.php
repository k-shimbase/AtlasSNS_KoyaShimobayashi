<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />

    <title>AtlasSNS</title>

    <!--CDN経由CSS読み込み(BootstrapとBootstrap icon)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--ローカルCSS読み込み-->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>

    <!--ヘッダー-->
    <header>
        @include('layouts.navigation')
    </header>

    <!--ページコンテンツ-->
    <div id="row">

    <!--────────────────────────────────────-->
    <!--◆メインコンテナ(画面左側)            -->
    <!--────────────────────────────────────-->
    <div id="container">
        {{ $slot }}
    </div>

    <!--────────────────────────────────────-->
    <!--◆サイドバー(画面右側)                -->
    <!--────────────────────────────────────-->
    <div id="sidebar">

        <!--◇情報確認エリア-->
        <section id="confirm">
            <p>{{ Auth::user()->username }}さんの</p>

            <!--◇フォロー数-->
            <div class="follows_info">
                <p>フォロー数</p>
                <p>{{ Auth::user()->followingsCount() }}人</p>
            </div>
            <div class="btn custom_blue_button follows_btn"><a href="{{ route('auth.follow-list') }}">フォローリスト</a></div>

            <!--◇フォロワー数-->
            <div class="follows_info">
                <p>フォロワー数</p>
                <p>{{ Auth::user()->followersCount() }}人</p>
            </div>
            <div class="btn custom_blue_button follows_btn"><a href="{{ route('auth.follower-list') }}">フォロワーリスト</a></div>

        </section>

        <!--◇ユーザ検索エリア-->
        <section class="btn custom_blue_button search_btn">
            <a href="{{ route('auth.search') }}">ユーザー検索</a>
        </section>
    </div>

    <!--フッター-->
    <footer>
    </footer>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
