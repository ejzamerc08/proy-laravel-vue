<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

 
</head>

<body class="antialiased">

    <div>
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
            <p class="navbar-brand mb-0 h1">
                <img src="{{ asset('images/logo.jpg') }}" width="100" height="100">
                Institución Universitaria Digital de Antioquia
            </p>  
            </div>
        </nav> 
    </div>

<br>
<br>
<br>
<br>
<br><br>

    <div>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <section class="p-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md">
                                    <div class="card bg-dark text-light">
                                        <div class="card-body text-center">
                                            <div class="h1 mb-3">
                                                <i class="bi bi-laptop"></i>
                                            </div>
                                            <a href="{{ url('/login') }}" class="btn btn-primary">Iniciar Sesión</a>
                                        </div>
                                    </div>
                                </div>

                                @if (Route::has('register'))
                                    <div class="col-md">
                                        <div class="card bg-secondary text-light">
                                            <div class="card-body text-center">
                                                <div class="h1 mb-3">
                                                    <i class="bi bi-person-square"></i>
                                                </div>
                                                <a href="{{ url('/register') }}" class="btn btn-dark">Registrarse</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
            @endif
        @endauth

        @endif


    </div>
</body>

</html>
