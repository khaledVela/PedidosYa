<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Tiendas Boom
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @guest

                    @else
                        @if(Auth::user()->is_admin)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownPersonas" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Categorias
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPersonas">
                                    <a class="dropdown-item" href="{{ route('categorias.index') }}">
                                        Lista de Categorias
                                    </a>
                                    <a class="dropdown-item" href="{{ route('categorias.create') }}">
                                        Crear Categorias
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownPersonas" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Categorias Productos
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPersonas">
                                    <a class="dropdown-item" href="{{ route('categoriasproductos.index') }}">
                                        Lista de Categorias Productos
                                    </a>
                                    <a class="dropdown-item" href="{{ route('categoriasproductos.create') }}">
                                        Crear Categorias Productos
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownPersonas" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Productos
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPersonas">
                                    <a class="dropdown-item" href="{{ route('productos.index') }}">
                                        Lista de Productos
                                    </a>
                                    <a class="dropdown-item" href="{{ route('productos.create') }}">
                                        Crear Productos
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownPersonas" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Ventas
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPersonas">
                                    <a class="dropdown-item" href="{{ route('ventas.index') }}">
                                        Lista de Ventas
                                    </a>
                                </div>
                            </li>
                        @endif
                    @endguest
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
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

    <main class="py-4">
        @guest
            @yield('content')
        @else
            @if( Auth::user()->is_admin )
                @yield('admin')
            @endif
            @if( !Auth::user()->is_admin )
                @yield('logged')
            @endif
        @endguest
    </main>
</div>
</body>
</html>
