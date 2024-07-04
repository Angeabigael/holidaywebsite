@extends('backend.template')

@section('content')

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Soldes</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center" action="{{route('dashboard.solde.show')}}" method="get">
                            @csrf
                            <div class="col-auto">
                                <input type="text" id="search-orders" name="searchannee" value="{{old('searchannee')}}" class="form-control search-orders" placeholder="Rechercher par annee...">
                                <input type="text" id="search-orders" name="searchmat" value="{{old('searchmat')}}" class="form-control search-orders" placeholder="Rechercher par matricule...">
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
        <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Toutes les soldes</a>
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
                                    <th class= "cell">Matricule</th>
                                    <th class="cell">Nom</th>
                                    <th class="cell">Prénoms</th>
                                    <th class="cell">Solde Initial</th>
                                    <th class="cell">Solde Final</th>
                                    <th class="cell">Annee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($soldes as $solde)
                                    <tr>
                                        <td class="cell">{{$solde->id}}</td>
                                        <td class="cell">{{$solde->personnel->matricule}}</td>
                                        <td class="cell mt-2"><span class="truncate">{{$solde->personnel->nom}}</span></td>
                                        <td class="cell mt-2">{{$solde->personnel->prenoms}}</td>
                                        <td class="cell mt-2">{{$solde->solde_initial}}</td>
                                        <td class="cell mt-2">{{$solde->solde_final}}</td>
                                        <td class="cell mt-2">{{$solde->annee}}</td>
                                    </tr>
                                @empty
                                    <div class="col alert alert-warning">
                                        Aucun solde trouvé !!
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
                        {{ $soldes->appends(request()->query())->links() }}
                    </div>
                </ul>
            </nav><!--//app-pagination-->

        </div><!--//tab-pane-->

@endsection
