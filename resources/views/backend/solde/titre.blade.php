@extends('backend.template')

@section('content')

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Titres de congés</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form action="#" method="get" class="table-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" id="search-orders" name="searchmat" value="{{old('searchmat')}}" class="form-control search-orders" placeholder="Rechercher par matricule">
                                <input type="text" id="search-orders" name="searchname" value="{{old('searchname')}}" class="form-control search-orders" placeholder="Rechercher par nom">
                                <input type="text" id="search-orders" name="searchstruct" value="{{old('searchstruct')}}" class="form-control search-orders" placeholder="Rechercher par structure">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Rechercher</button>
                            </div>
                        </form>

                    </div><!--//col-->

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                </div><!--//row-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->


    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
        <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Générer vos titres de congés en choisissant le personnel indiqué</a>
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
                                    <th class="cell">Matricule</th>
                                    <th class="cell">Nom</th>
                                    <th class="cell">Prénoms</th>
                                    <th class="cell">Corps</th>
                                    <th class="cell">Structure</th>
                                    <th class="cell">Année</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employes as $employe)
                                    <form action="{{route('dashboard.solde.titredocument', $employe)}}" method="get">
                                        <tr>
                                            <td class="cell"><span class="truncate">{{$employe->id}}</span></td>
                                            <td class="cell">{{$employe->matricule}}</td>
                                            <td class="cell">{{$employe->nom}}</td>
                                            <td class="cell">{{$employe->prenoms}}</td>
                                            <td class="cell">{{$employe->corps}}</td>
                                            <td class="cell">{{$employe->structure->designation}}</td>
                                            <td>
                                                <select name="annee" id="">
                                                    @foreach ($annees as $annee)
                                                        <option value="{{$annee}}">{{$annee}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end gap-2">
                                                    <button class="btn btn-primary" type="submit">Générer</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                @empty
                                    <div class="col alert alert-warning">
                                        Aucun personnel trouvé !!
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
                        {{ $employes->appends(request()->query())->links() }}
                    </div>
                </ul>
            </nav><!--//app-pagination-->

        </div><!--//tab-pane-->
    </div><!--//tab-content-->

@endsection
