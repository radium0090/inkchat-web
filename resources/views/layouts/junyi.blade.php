<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        body{  
            background-color: #2E3191; 

        } 
        .label{
            color: #FFFFFF;
            font-weight: bold;
            font-size: 120%;
        }
        .labely{
            color: #FFEC00;
            font-weight: bold;
        }
        .label2{
            color: #FFFFFF;
            font-weight: bold;
            font-size: 150%;
        }
        .label3{
            color: #FFFFFF;
            font-weight: bold;
            font-size: 180%;
        }

        .labelbg{
            color: #000000;
            background-color:#FFFFFF;
            font-weight: bold;
            font-size: 200%;
            padding:3px;
            border-radius: 5px;
        }
        .labelbgs{
            color: #000000;
            background-color:#FFFFFF;
            font-weight: bold;
            font-size: 90%;
            padding:3px;
            border-radius: 3px;
        }
        .infop{
            color:#000000;
            background-color: #FFFFFF;
            font-size: 100%;
            border-radius: 10px;
        }
        button{
            font-size: 170%;
        }

    </style>
</head>
<body>
    @yield('content')
</body>
</html>
