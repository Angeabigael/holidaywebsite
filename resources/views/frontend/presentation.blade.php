@extends('base')
@section('content')
    <section class="vh-100 bg-image" style="background-image: url('/img/fer.jpg'); background-size:cover;background-repeat:no-repeat;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    <h3 class="text-uppercase text-center mb-5"><u>Dernière étape : vérification des informations</u></h3>

                    <form action="{{route('presentation.validate')}}" method="POST">
                        @csrf
                        @error('matricule')
                            <div class="text-danger text-center">
                               <h4>{{ $message }}</h4>
                            </div>
                         @enderror
                        <div class="row">
                            <div class="col-sm-6">
                                <div data-mdb-input-init class="form-group form-outline mb-4">
                                    <span class="form-label font-weight-bold">Matricule</span>
                                    <input class="form-control form-control-lg" name="matricule" type="text" placeholder="Entrez votre matricule">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div data-mdb-input-init  class="form-group form-outline">
                                    <span class="form-label font-weight-bold">Nom</span>
                                    <input class="form-control form-control-lg" type="text" name="nom" placeholder="Entrez votre nom">
                                </div>
                            </div>
                        </div>
                        <div data-mdb-input-init class="form-group form-outline">
                            <span class="form-label font-weight-bold">Prénom</span>
                            <input class="form-control form-control-lg" type="text" name="prenom" placeholder="Entrez votre Prénom">
                        </div>
                        <div data-mdb-input-init class="form-group form-outline">
                            <span class="form-label font-weight-bold">Corps</span>
                            <select class="form-control form-control-lg" name="corps">
                                <option>Civils</option>
                                <option>Militaires</option>
                            </select>
                            <span class="select-arrow"></span>
                        </div>
                        <div data-mdb-input-init  class="form-group form-outline">
                            <span class="form-label font-weight-bold">Structure</span>
                            <select class="form-control form-control-lg" name="structure">
                                @foreach ($structures as $structure)
                                    <option>{{$structure->designation}}</option>
                                @endforeach
                            </select>
                            <span class="select-arrow"></span>
                            @error('structure')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Valider</button>
                        </div>

                    </form>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

@endsection


