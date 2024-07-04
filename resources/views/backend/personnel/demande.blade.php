@extends('backend.template')

@section('content')

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Demandes</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form action="{{route('dashboard.demande.search')}}" class="table-search-form row gx-1 align-items-center">
                            @csrf
                            <div class="col-auto">
                                <input type="text" id="search-orders" name="searchtype" value="{{old('searchtype')}}" class="form-control search-orders" placeholder="Rechercher par typedeconge...">
                                <input type="text" id="search-orders" name="searchnom" value="{{old('searchnom')}}" class="form-control search-orders" placeholder="Rechercher par nom...">
                                <input type="text" id="search-orders" name="searchprenom" value="{{old('searchprenom')}}" class="form-control search-orders" placeholder="Rechercher par prenom...">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Rechercher</button>
                            </div>
                        </form>
                    </div><!--//col-->
                </div><!--//row-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
    </div><!--//row-->


    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
        <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Toutes les demandes</a>
        <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Demandes Approuvées</a>
        <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Demandes en attente</a>
        <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Demandes rejetées</a>
    </nav>


    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="cell">N°</th>
                                    <th class="cell">Nom</th>
                                    <th class="cell">Prénoms</th>
                                    <th class="cell">Motif</th>
                                    <th class="cell">Statut</th>
                                    <th class="cell">Date-Début-Congé</th>
                                    <th class="cell">Date-Fin-Congé</th>
                                    <th class="cell">Type congé</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($demandes as $demande)
                                    <tr>
                                        <td class="cell">{{$demande->id}}</td>
                                        <td class="cell mt-2"><span class="truncate">{{$demande->personne->nom}}</span></td>
                                        <td class="cell mt-2">{{$demande->personne->prenoms}}</td>
                                        <td class="cell mt-2">{{$demande->motif}}</td>
                                        <td class="cell mt-2">
                                            <span class="
                                                @if($demande->statut == "En attente") badge bg-warning
                                                @elseif($demande->statut == "Approuvé") badge bg-success
                                                @else badge bg-danger
                                                @endif
                                            ">
                                                {{$demande->statut}}
                                            </span>
                                        </td>
                                        <td class="cell mt-2"><span class="cell-data">{{$demande->date_debut_conge}}</span></td>
                                        <td class="cell mt-2"><span class="cell-data">{{$demande->date_fin_conge}}</span></td>
                                        <td class="cell mt-2">{{$demande->typedemande->intitule}}</td>
                                        <td class="cell mt-2"><a class="btn-sm app-btn-secondary" href="{{route('dashboard.demande.infos', $demande)}}">Voir+</a></td>
                                    </tr>
                                @empty
                                    <div class="col alert alert-warning">
                                        Aucune demande trouvée !!
                                    </div>
                                @endforelse


                            </tbody>
                        </table>
                    </div><!--//table-responsive-->

                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                    <div class="my-4">
                        {{ $demandes->appends(request()->query())->links() }}
                    </div>
                </ul>
            </nav><!--//app-pagination-->

        </div><!--//tab-pane-->

        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">

                        <table class="table mb-0 text-left app-table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="cell">N°</th>
                                    <th class="cell">Nom</th>
                                    <th class="cell">Prénoms</th>
                                    <th class="cell">Motif</th>
                                    <th class="cell">Statut</th>
                                    <th class="cell">Date-Début-Congé</th>
                                    <th class="cell">Date-Fin-Congé</th>
                                    <th class="cell">Type congé</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($validates as $validate)
                                    <tr>
                                        <td class="cell">{{$validate->id}}</td>
                                        <td class="cell"><span class="truncate">{{$validate->personne->nom}}</span></td>
                                        <td class="cell">{{$validate->personne->prenoms}}</td>
                                        <td class="cell">{{$validate->motif}}</td>
                                        <td class="cell">
                                            <span class="badge bg-success">{{$validate->statut}}</span>
                                        </td>
                                        <td class="cell"><span class="cell-data"></span>{{$validate->date_debut_conge}}</td>
                                        <td class="cell"><span class="cell-data"></span>{{$validate->date_fin_conge}}</td>
                                        <td class="cell">{{$validate->typedemande->intitule}}</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('dashboard.demande.modif', $validate)}}">Modifier</a></td>
                                    </tr>
                                @empty
                                    <div class="col alert alert-warning">
                                        Aucune demande trouvée !!
                                    </div>
                                @endforelse

                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                    <div class="my-4">
                        {{ $validates->appends(request()->query())->links() }}
                    </div>
                </ul>
            </nav><!--//app-pagination-->
        </div><!--//tab-pane-->

        <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left app-table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="cell">N°</th>
                                    <th class="cell">Nom</th>
                                    <th class="cell">Prénoms</th>
                                    <th class="cell">Motif</th>
                                    <th class="cell">Statut</th>
                                    <th class="cell">Date-Début-Congé</th>
                                    <th class="cell">Date-Fin-Congé</th>
                                    <th class="cell">Type congé</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($attentes as $attente)
                                    <tr>
                                        <td class="cell">{{$attente->id}}</td>
                                        <td class="cell"><span class="truncate">{{$attente->personne->nom}}</span></td>
                                        <td class="cell">{{$attente->personne->prenoms}}</td>
                                        <td class="cell">{{$attente->motif}}</td>
                                        <td class="cell">
                                            <span class="badge bg-warning">
                                               {{$attente->statut}}
                                            </span>
                                        </td>
                                        <td class="cell"><span class="cell-data"></span>{{$attente->date_debut_conge}}</td>
                                        <td class="cell"><span class="cell-data"></span>{{$attente->date_fin_conge}}</td>
                                        <td class="cell">{{$attente->typedemande->intitule}}</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('dashboard.demande.show', $attente)}}">Modifier</a></td>
                                    </tr>
                                @empty
                                    <div class="col alert alert-warning">
                                        Aucune demande trouvée !!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                    <div class="my-4">
                        {{ $attentes->appends(request()->query())->links() }}
                    </div>
                </ul>
            </nav><!--//app-pagination-->
        </div><!--//tab-pane-->
        <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left app-table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="cell">N°</th>
                                    <th class="cell">Nom</th>
                                    <th class="cell">Prénoms</th>
                                    <th class="cell">Motif</th>
                                    <th class="cell">Statut</th>
                                    <th class="cell">Date-Début-Congé</th>
                                    <th class="cell">Date-Fin-Congé</th>
                                    <th class="cell">Type congé</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($echecs as $echec)
                                    <tr>
                                        <td class="cell">{{$echec->id}}</td>
                                        <td class="cell"><span class="truncate">{{$echec->personne->nom}}</span></td>
                                        <td class="cell">{{$echec->personne->prenoms}}</td>
                                        <td class="cell">{{$echec->motif}}</td>
                                        <td class="cell">
                                            <span class="badge bg-danger">
                                                {{$echec->statut}}
                                            </span>
                                        </td>
                                        <td class="cell"><span class="cell-data"></span>{{$echec->date_debut_conge}}</td>
                                        <td class="cell"><span class="cell-data"></span>{{$echec->date_fin_conge}}</td>
                                        <td class="cell">{{$echec->typedemande->intitule}}</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('dashboard.demande.echec', $echec)}}">Modifier</a></td>
                                    </tr>
                                @empty
                                    <div class="col alert alert-warning">
                                        Aucune demande trouvée !!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                    <div class="my-4">
                        {{ $echecs->appends(request()->query())->links() }}
                    </div>
                </ul>
            </nav><!--//app-pagination-->
        </div><!--//tab-pane-->
    </div><!--//tab-content-->
@endsection
