<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
        <a href="{{ url('/dashboard') }}" class="navbar-brand mb-0 h1">
            <img src="{{ asset('images/logo.jpg') }}" width="100" height="100">
            Institución Universitaria Digital de Antioquia
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="{{ url('/dashboard') }}" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item active">
                    <a href="{{ url('/dashboard/post') }}" class="nav-link">Publicaciones</a>
                </li>
                <li class="nav-item active">
                    <a href="{{ url('/dashboard/category') }}" class="nav-link">Categorias</a>
                </li>
            </ul>
        </div>    
        </div>  


        {{--  --}}
        <x-dropdown-link :href="route('profile.edit')">
            {{ __('Perfil') }}
        </x-dropdown-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Salir') }}
            </x-dropdown-link>
        </form>
         {{--  --}}

    </nav> <br><br><br><br><br>     

    @yield('contenido')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>