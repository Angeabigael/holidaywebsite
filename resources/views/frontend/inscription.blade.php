@extends("base")
@section("title","Inscription")

@section("content")

    <section class="vh-100 bg-image" style="background-image: url('/img/fer.jpg'); background-size:cover;background-repeat:no-repeat;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5"><u>Inscription</u></h2>

                    <form action="{{route('inscription')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div data-mdb-input-init class="form-group form-outline mb-4">
                                    <input class="form-control form-control-lg" name="matricule" type="text" placeholder="Votre matricule">
                                    @error('matricule')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div data-mdb-input-init  class="form-group form-outline mb-4">
                                    <input class="form-control form-control-lg" type="text" name="nom" placeholder="Votre nom">
                                    @error('nom')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div data-mdb-input-init class="form-group form-outline mb-4">
                            <input class="form-control form-control-lg" type="text" name="prenom" placeholder="Votre prénom">
                            @error('prenom')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Votre email" />
                            <label class="form-label" for="email"></label>
                            @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Entrez votre mot de passe"  />
                            <label class="form-label" for="password"></label>
                            @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline">
                            <input type="password" id="tpassword" name="rpassword" class="form-control form-control-lg" placeholder="Confirmez votre mot de passe" required  />
                            <label class="form-label text-danger display-5" id="erreur"></label>
                        </div>

                        <!--<div class="form-check d-flex justify-content-center mb-5">
                        <label class="form-check-label" for="form2Example3g">
                            Je suis d'accord avec les <a href="#!" class="text-body"><u>termes de politiques et confidentialité</u></a> de l'institution.
                        </label>
                        </div>-->

                        <div class="d-flex justify-content-center">
                            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">S'inscrire</button>
                        </div>

                        <p class="mt-5"><h4 class="text-center">Bonne continuation!!</h4></p>

                    </form>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

@endsection
