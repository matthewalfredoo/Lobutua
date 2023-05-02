<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/function.js') }}" defer></script>
    <script src="asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==') }}"
        crossorigin="anonymous" defer></script>
    <script src="{{ asset('jquery/jquery-ui.js') }}" defer></script>
    <script src="{{ asset('jquery/jquery.js') }}" defer></script>
    <script src="{{ asset('jquery/jquery-ui.min.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="jquery/jquery-ui.css">
    <link rel="stylesheet" href="jquery/jquery-ui.min.css">
    <link href="{{ asset('css/transition.css') }}" rel="stylesheet">

    <!-- Tab Icon -->
    <link rel="icon" href="{{ asset('img/icon.png') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="ok">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/icon.png') }}" alt="Lobutua" class="web-icon">
                    <span class="web-title">{{ config('app.name', 'Layanan Desa Lobutua') }}</span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('beranda.index') }}">{{ __('Beranda') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pengumuman') ? 'active' : '' }}" href="{{ route('pengumuman.index') }}">{{ __('Pengumuman') }}</a>
                        </li>
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        @can('role-list')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('roles') ? 'active' : '' }}" href="{{ route('roles.index') }}">{{ __('Role') }}</a>
                        </li>
                        @endcan

                        @can('user-list')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ route('users.index') }}">{{ __('User') }}</a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" aria-haspopup="true"
                                data-toggle="dropdown">Administrasi</a>
                            <div class="dropdown show">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('pribadi.index') }}">Dokumen Pribadi</a>
                                    <a class="dropdown-item" href="{{ route('pengantar.pindah') }}">Surat Pengantar</a>
                                    <a class="dropdown-item" href="{{ route('keterangan.index') }}">Surat Keterangan</a>
                                    <a class="dropdown-item" href="{{ route('administrasi.pribadi') }}">Daftar Administrasi</a>
                                </div>
                            </div>
                        </li>

                        @can('laporan-list')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('laporan') ? 'active' : '' }}" href="{{ route('laporan.index') }}">{{ __('Laporan') }}</a>
                        </li>
                        @endcan

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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

        @if(request()->is('/') ? 'active' : '')
        <main class="py-0">
            @yield('contentberanda')
        </main>

        @else
        <main class="py-4">
            @yield('content')
        </main>
        @endif

        <footer>
            <div class="jumbotron" id="jumbo-footer">
                <div class="container">
                    <div class="row" id="footer-container">
                        <div class="col-sm-3">
                            <div class="layanan-customer-footer mb-2">
                                <i class="fas fa-phone-alt"> <span id="layanan-customer-judul">Layanan
                                        Customer</span></i>
                            </div>

                            <div class="layanan-customer-text mb-3">
                                <label id="layanan-customer-text">Email: support24@gmail.com<br />
                                    No.telp: +62 000140<br />Fax: +62 1110 0249 001 </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="layanan-customer-footer mb-2">
                                <i class="fas fa-link"> <span id="layanan-customer-judul">Links</span></i>
                            </div>

                            <div class="layanan-customer-text mb-3">
                                <label id="layanan-customer-text">Email: support24@gmail.com<br />
                                    No.telp: +62 000140<br />Fax: +62 1110 0249 001 </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="layanan-customer-footer mb-2">
                                <i class="fas fa-book-open"> <span id="layanan-customer-judul">Alamat</span></i>
                            </div>

                            <div class="layanan-customer-text mb-3">
                                <label id="layanan-customer-text">Jl. Kantor Desa Lobutua
                                    Lobutua, Humbang Hasundutan (220420),Sumatera Utara</label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="layanan-customer-footer mb-2">
                                <i class="fas fa-bell"> <span id="layanan-customer-judul">Media Sosial</span></i>
                            </div>

                            <div class="layanan-customer-text mb-3">
                                <label id="layanan-customer-text">Instagram: <a href="#">Lobutua Instagram</a><br />
                                    Facebook: <a href="#">Lobutua Facebook</a><br />
                                    Twitter: <a href="#">Lobutua Twitter</a><br />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>