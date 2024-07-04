<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet" >
    @yield('css')
    <title>@yield('title') Gestion de congés</title>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgb(0, 114, 57)">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/lgcst.jfif')}}" width="250" height="60" alt="Logo Cour Suprême">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toogle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>Menu
            </button>


            @php
            $route = request()->route()->getName();
            @endphp

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{route('layout.accueil')}}" @class(['nav-link', 'active' => str_contains($route, '.accueil')])>Accueil</a>
                    </li>
                  <!--  <li class="nav-item">
                        <a href="{{route('layout.demande')}}" @class(['nav-link', 'active' => str_contains($route, '.demande')])>Demandes</a>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a href="#" id="navbarDropdownMenuLink" @class(['nav-link', 'dropdown-toggle', 'active' => str_contains($route, '.apropos')]) data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">A propos</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Historique de demandes</a></li>
                            <li><a class="dropdown-item" href="#">Titre de congés</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container mt-5">

        @yield('content')

    </div>


    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
