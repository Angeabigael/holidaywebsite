@extends('frontend.layout')


@yield('title', 'Accueil|')


@section('css')

    <link href="/css/stylewelcome.css" rel="stylesheet">

@endsection


@section('content')

    <div class="container mt-3" style="padding-top: 90px">
        <h4 style="font-weight: bold; text-decoration: underline;" >PLATEFORME DE GESTION DE CONGÉ ET D'AUTORISATION D'ABSENCE</h4>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 p-auto">
                <p class="text-justify" style="padding-top: 80px">Bienvenue sur notre plateforme de gestion de demandes de congés et d'autorisation d'absence. Grâce à cette plateforme, vous allez pouvoir plus facilement en quelques clics soumettre vos demandes de congés, suivre vos demmandes et gérer vos demandes.
                    N'hésitez pas à parcourir l'ensemble du site pour découvrir ces fonctionnalités.
                </p>
                <a href="{{route('layout.demande')}}" class="btn btn-outline-success mt-3">Commencer</a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <img src="/img/logr.png" alt="" class="d-block w-100">
            </div>
        </div>
    </div>

@endsection
