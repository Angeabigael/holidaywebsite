@extends('backend.template')

@section('content')

    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h3>Modification de la demande n°{{$echec->id}}</h3>
            </div>
            <form action="{{route('dashboard.demande.review', $echec)}}" method="post">
                @csrf
                @method('post')
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Nom :</div>
                        <div class="col-md-8">{{ $echec->personne->nom }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Prénoms :</div>
                        <div class="col-md-8">{{ $echec->personne->prenoms }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Motif :</div>
                        <div class="col-md-8">{{ $echec->motif }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Statut :</div>
                        <div class="col-md-8">
                            <span class="badge bg-{{ $echec->statut == 'Approuvé' ? 'success' : ($echec->statut == 'Rejeté' ? 'danger' : 'warning') }}">
                                {{ ucfirst($echec->statut) }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Période de congés :</div>
                        <div class="col-md-8">{{ $echec->periode_conge }}<span> jours</span></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Date de Début du Congé :</div>
                        <div class="col-md-8">{{ $echec->date_debut_conge }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Date de Fin du Congé :</div>
                        <div class="col-md-8">{{ $echec->date_fin_conge }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Type de congés :</div>
                        <div class="col-md-8">{{ $echec->typedemande->intitule }}</div>
                    </div>
                    <div class="d-flex justify-content-start gap-2 mt-4">
                        <button class="btn btn-primary">Approuver</button>
                        <a href="{{route('dashboard.personnel.demande')}}" class="btn btn-warning">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
