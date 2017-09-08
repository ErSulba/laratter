<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
   <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app" class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md navbar-light  bg-faded ">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/" >{{ config('app.name', 'Laravel') }}</a>
        <!-- Right Side of Navbar -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <form action="/messages">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Buscar..." required>
                            <span class="input-group-btn">
                                        <button class="btn btn-outline-success">Buscar</button>
                                    </span>
                        </div>
                    </form>
                </li>
            </ul>
            <!-- Authentication Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link"href="/">Inicio <span class="sr-only">(current)</span></a>
                </li>
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Salir </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                @endif

            </ul>

        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>