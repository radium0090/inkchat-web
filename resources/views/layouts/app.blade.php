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
    <script src="{{ asset('js/tagsinput.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom_front.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/login-main.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/login-util.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('css/tagsinput.css') }}" rel="stylesheet" />

    <!-- google adsense -->
    <script data-ad-client="ca-pub-1668811522927993" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153523067-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-153523067-1');
    </script>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}" width="120">
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
            <p class="mb-1">&copy; InkChat</p>
            <ul class="list-inline">
            <li class="list-inline-item"><a href="/privacy_policy.html">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="/terms_and_conditions.html">Terms & Conditions</a></li>
            <li class="list-inline-item"><a href="/contact">Support</a></li>
            </ul>
        </footer>
    </div>
    @yield('javascript')
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('js/login-main.js') }}"></script>
    <script>
        $(document).ready(function(){
            @if (!auth() -> guest())
                var id = {{ auth()->user()->id}};
            @endif
            console.log("private channel:" + `user.${id}`);
            Echo.private(`user.${id}`)
                .listen('GotNewFollower', (e) => {
                    console.log('got sth');
                    console.log(e.user.name);
                    $('#notice_count').html(parseInt($('#notice_count').html(), 10)+1)
            });

            Echo.private(`App.User.${id}`)
                .notification((notification) => {
                    //addNotifications([notification], '#notifications');
                    console.log('got notification');
                    console.log(notification);
                    $('#notice_count').html(parseInt($('#notice_count').html(), 10)+1)
            });
        });
    </script>
</body>
</html>
