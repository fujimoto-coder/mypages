<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
        <style>
            li a {
                color: #f8f9fa;
                text-decoration: underline;
                display: block;
                background-color: #8f99a3;
                margin-right: 10px;
                /* width: 80px; */
                text-align: center;
                font-size: 15px;
                text-decoration: none;
                padding: 11px;
            }
                
        </style>
    </head>
    <body>
             <header>
            <div class="container">
             <div class="header-title-area">
             <h1 class="logo">Musicbeach</h1>
             <p class="text-sub">あなたに最適な音楽情報を提供します。</p>
             </div>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                          
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav">
                            <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                 </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
            @guest
            <ul>
                <li><a href="https://b0615c5757084f92b3bce3e655e574c7.vfs.cloud9.ap-northeast-1.amazonaws.com/">投稿一覧</a></li>
                <li><a href="{{ route('pages.show_music') }}">音楽</a></li>
                <li><a href="{{ route('pages.show_artist') }}">アーティスト</a></li>
                <li><a href="{{ route('pages.show_live') }}">ライブ/コンサート</a></li>
                <li><a href="{{ route('pages.show_lesson') }}">レッスン</a></li>
                <li><a href="{{ route('pages.show_instrument') }}">楽器 </a></li>
                <li><a href="{{ route('pages.show_bar') }}">ミュージックバー/レストラン </a></li>
                <li><a href="admin/profile/create">ID</a></li>
            </ul>
            @else
            <ul>
                <li><a href="https://b0615c5757084f92b3bce3e655e574c7.vfs.cloud9.ap-northeast-1.amazonaws.com/">投稿一覧</a></li>
                <li><a href="{{ route('pages.show_music') }}">音楽</a></li>
                <li><a href="{{ route('pages.show_artist') }}">アーティスト</a></li>
                <li><a href="{{ route('pages.show_live') }}">ライブ/コンサート</a></li>
                <li><a href="{{ route('pages.show_lesson') }}">レッスン</a></li>
                <li><a href="{{ route('pages.show_instrument') }}">楽器 </a></li>
                <li><a href="{{ route('pages.show_bar') }}">ミュージックバー/レストラン </a></li>
                <li><a href="admin/pages/create">投稿</a></li>
                <li><a href="admin/profile/create">ID</a></li>
            </ul>
            @endguest
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>