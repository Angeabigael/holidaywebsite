@extends('backend.template')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h3>Informations de la demande n°{{$demande->id}}</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Nom :</div>
                <div class="col-md-8">{{ $demande->personne->nom }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Prénoms :</div>
                <div class="col-md-8">{{ $demande->personne->prenoms }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Motif :</div>
                <div class="col-md-8">{{ $demande->motif }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Statut :</div>
                <div class="col-md-8">
                    <span class="badge bg-{{ $demande->statut == 'Approuvé' ? 'success' : ($demande->statut == 'Rejeté' ? 'danger' : 'warning') }}">
                        {{ ucfirst($demande->statut) }}
                    </span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Période de congés :</div>
                <div class="col-md-8">{{ $demande->periode_conge }}<span> jours</span></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Date de Début du Congé :</div>
                <div class="col-md-8">{{ $demande->date_debut_conge }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Date de Fin du Congé :</div>
                <div class="col-md-8">{{ $demande->date_fin_conge }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Type de congés :</div>
                <div class="col-md-8">{{ $demande->typedemande->intitule }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
