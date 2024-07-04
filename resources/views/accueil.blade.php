@extends('base')
@section('title','Connexion')
@section('content')
    <section class="vh-100 bg-image" style="background-image: url('/img/fer.jpg'); background-size:cover;background-repeat:no-repeat;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                @if(session('msg'))
                    <div class="alert alert-info">
                        {{session('msg')}}
                    </div>
                @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Connexion</h2>

                    <form action="{{route('loginpost')}}" method="POST">
                        @csrf
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Entrez votre email" />
                            <label class="form-label" for="email"></label>
                            @error("email")
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Entrez votre mot de passe"  />
                            <label class="form-label" for="password"></label>
                            @error("password")
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check d-flex justify-content-center mb-5">
                            <label class="form-check-label" for="form2Example3g">
                                Je suis d'accord avec les <a href="#!" class="text-body"><u>termes de politiques et confidentialité</u></a> de l'institution.
                            </label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button  type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Suivant</button>
                        </div>

                        <p class="text-center text-muted mt-5 mb-0">Vous n'avez pas un compte? <a href="{{route('inscription')}}"
                            class="fw-bold text-body"><u>Inscrivez-vous ici alors</u></a>
                        </p>

                    </form>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
