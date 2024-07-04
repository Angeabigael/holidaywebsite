@extends('backend.template')

@section('content')

    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h3>Modification de la demande n°{{$validate->id}}</h3>
            </div>
            <form action="{{route('dashboard.demande.edit', $validate)}}" method="post">
                <div class="card-body">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Nom :</div>
                        <div class="col-md-8">{{ $validate->personne->nom }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Prénoms :</div>
                        <div class="col-md-8">{{ $validate->personne->prenoms }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Motif :</div>
                        <div class="col-md-8">{{ $validate->motif }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Statut :</div>
                        <div class="col-md-8">
                            <span class="badge bg-{{ $validate->statut == 'Approuvé' ? 'success' : ($validate->statut == 'Rejeté' ? 'danger' : 'warning') }}">
                                {{ ucfirst($validate->statut) }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Période de congés :</div>
                        <div class="col-md-8">{{ $validate->periode_conge }}<span> jours</span></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Date de Début du Congé :</div>
                        <div class="col-md-8">{{ $validate->date_debut_conge }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Date de Fin du Congé :</div>
                        <div class="col-md-8">{{ $validate->date_fin_conge }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Type de congés :</div>
                        <div class="col-md-8">{{ $validate->typedemande->intitule }}</div>
                    </div>
                    <div class="d-flex justify-content-start gap-2 mt-4">
                        <button class="btn btn-danger">Rejeter</button>
                        <a href="{{route('dashboard.personnel.demande')}}" class="btn btn-warning">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
