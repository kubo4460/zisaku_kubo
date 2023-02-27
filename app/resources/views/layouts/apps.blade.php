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
        <nav class="bg-white shadow-sm">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <div class="d-flex justify-content-around py-1 px-2">
                    <div class="col">
                        <a class="btn btn-light" href="{{ route('login') }}">
                            <i class="far fa-user"></i>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('home') }}" class="text-danger">
                            <i class="fas fa-home fa-2x"></i>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-8">
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
                        <div class="col">
                            <a href="{{ route('cart.show') }}" class="btn btn-light">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>



                @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('') }}</a>
                @endif
                @else
                @can('user-higher')
                <div class="d-flex justify-content-around py-1 px-2">
                    <div class="col">
                        <a class="btn btn-light" href="{{ route('users.show', Auth::user()->id) }}">
                            <i class="far fa-user"></i>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('home') }}" class="text-danger">
                            <i class="fas fa-home fa-2x"></i>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-8">
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
                        <div class="col">
                            <a href="{{ route('cart.show') }}" class="btn btn-light">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>

                @elsecan('admin-higher')
                <div class="d-flex justify-content-around py-1 px-2">
                    <a href="{{ route('home') }}" class="text-danger">
                        <i class="fas fa-home fa-2x"></i>
                    </a>
                    <a href="{{ route('logout') }}" class="text-secondary pt-2" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                    </a>
                </div>
                @endcan

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>

            @endguest
        </nav>
    </div>

    <main class="py-4">
        @yield('content')
    </main>

    <div class="text-center">
        <a href="{{ route('home') }}" class="h4 text-secondary">
            KUBO MADE ONLINE STORE
        </a>
    </div>
    <div class="col-3">
        <a href="{{ route('information.create') }}" class="h5 text-secondary ">お問い合わせ</a>
    </div>
    <div class="text-center">
        <span class="twitter">
            <i class="fab fa-2x m-2 fa-twitter"></i>
        </span>
        <span class="instagram">
            <i class="fab fa-2x m-2 fa-instagram"></i>
        </span>
        <span class="facebook">
            <i class="fab fa-2x m-2 fa-facebook"></i>
        </span>
    </div>
</body>

</html>