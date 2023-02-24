<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/_ajaxlike.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <a href="{{ route('information.create') }}" class="text-secondary ">お問い合わせ</a>

                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="far fa-user"></i>
                    </a>
                    <a href="{{ route('home') }}" class="text-danger">
                        <i class="fas fa-home fa-2x"></i>
                    </a>

                    <form action="{{ route('search.add') }} " method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                            <div class="">
                                <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('cart.show') }}" class="btn btn-light">
                        <i class="fas fa-shopping-cart"></i>
                    </a>


                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('') }}</a>
                    </li>
                    @endif
                    @else
                    @can('user-higher')

                    <div class="col-2">
                        <a class="btn btn-light" href="{{ route('users.show', Auth::user()->id) }}">
                            <i class="far fa-user"></i>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('home') }}" class="text-danger">
                            <i class="fas fa-home fa-2x"></i>
                        </a>
                    </div>
                    <div class="col-7">
                        <form action="{{ route('search.add') }} " method="get">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                <div class="">
                                    <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('cart.show') }}" class="btn btn-light">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>

                    @elsecan('admin-higher')
                    <a href="{{ route('home') }}" class="text-danger">
                        <i class="fas fa-home fa-2x"></i>
                    </a>
                    <a href="{{ route('logout') }}" class="text-secondary pt-2" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                    </a>
                    @endcan

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
            @endguest
        </nav>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
    <a href="{{ route('information.create') }}" class="text-secondary ">お問い合わせ</a>

</body>

</html>