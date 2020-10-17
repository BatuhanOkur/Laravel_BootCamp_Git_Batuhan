<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">
    <style>
        .navbar {
            opacity: 0.8;
            border-bottom: 1px solid #fff;
        }

        .jumbotron {
            padding-top: 100px;
        }

        .social-media-list-item{
            list-style: none;
            float: left;
        }

        .social-media-list-item a{
            border-radius: 50%;
        }
        .card{
            display: inline-block;
            margin-bottom: 20px;
            margin-left: 50px;
        }
        .card-img-top{
            height: 180px;
            width: 286px;
        }
        .nav-item{
            color: white;
        }
        .btn-dark:hover{
            color: #343A40;
            background-color: white;
        }

        .btn-primary:hover{
            color: #227DC7;
            background-color: white;
        }

        .img-overlay{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: #2C3136;
            opacity: 0;
        }

        .img-overlay .icon{
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }

        .card:hover .img-overlay{
            opacity: .8;
        }

        @yield('style')

    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container" >
            <a class="navbar-brand " style="color: white;" href="{{ url('/') }}">
                <i class="fas fa-book"></i>&nbsp;Dadya Kitapçılık
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item mr-2">
                        <a href="/" class="nav-link"><i class="fas fa-home"></i></a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}&nbsp;<i class="fas fa-sign-in-alt"></i></a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}&nbsp;<i class="fas fa-user-plus"></i></a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a href="/sepetim" class="nav-link"><i class="fas fa-shopping-cart"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img style="border-radius: 50%; width: 30px;" class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"  /> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/user/profile">
                                    {{ __('Profil') }}
                                </a>
                                <a class="dropdown-item" href="{{route('admin')}}" >
                                    {{ __('Kullanıcı Paneli') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Çıkış Yap') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <header>

        <div class="jumbotron text-white bg-dark" >
            <div class="container">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic">
                        Dadya Kitapçılık
                    </h1>
                    <p class="lead my-3 font-italic">
                        Kitaplar, sessiz öğretmenlerdir.  -Gellius
                    </p>
                    <p class="lead mb-0">
                        <a href="#" class="text-white font-weight-bold">Okumaya devam et...</a>
                    </p>
                </div>
            </div>
        </div>


    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="py-5 bg-dark text-white text-center">
        Dadya © 2020 All Rights Reserved
    </footer>
</div>
<script>
    setTimeout(function() {
        $('.alert-danger').remove();
    }, 5000);


</script>
</body>
</html>
