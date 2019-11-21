<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <span class="icon-bar top-bar"></span>
	                <span class="icon-bar middle-bar"></span>
	                <span class="icon-bar bottom-bar"></span>	
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class=".navbar-text">
                        @yield('preftitle')
                    </div>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      　

                        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="/">ホーム</a>
                        </li>

                        <!--
                        <li class="nav-item {{ request()->is('/search') ? 'active' : '' }}">
                            <a class="nav-link" href="/contact">検索</a>
                        </li>
                        -->

                        <li class="nav-item {{ request()->is('/mypage/posts/create') ? 'active' : '' }}">
                            <a class="nav-link" href="/mypage/posts/create">投稿</a>
                        </li>
                        


                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item　">
                                <a class="nav-link" href="{{ route('mypage.home') }}" >
                                        マイページ
                                </a>
                            </li>
                            <li class="nav-item　">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </li>
                        @endguest

                        <li class="nav-item {{ request()->is('/contact') || request()->is('/contact/*') ? 'active' : '' }}">
                            <a class="nav-link" href="/contact">運営へお問合せ</a>
                        </li>
                        
                    </ul>

                   
                </div>
            </div>
        </nav>

        <main class="py-1">
            @if(session('message'))
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; softbase.jp</p>
            <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
    @yield('javascript')
</body>
</html>
