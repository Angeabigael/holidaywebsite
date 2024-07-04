@extends('backend.template')

@section('content')

    <h1>{{$employe->exists ?'Modification':'Création'}}</h1>
    <form action="{{route($employe->exists ? 'dashboard.personnel.update' : 'dashboard.personnel.create', $employe)}}" method="post" class='vstack gap-2'>
        @csrf
        @method($employe->exists ? 'put': 'post')
        <div class="row">
            <div class="col-sm-6">
                <div data-mdb-input-init class="form-group form-outline mb-4">
                    <span class="form-label">Matricule</span>
                    <input class="form-control form-control-lg" name="matricule" type="text" value="{{$employe->exists ?$employe->matricule:""}}" required>
                    @error('matricule')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div data-mdb-input-init  class="form-group form-outline">
                    <span class="form-label">Nom</span>
                    <input class="form-control form-control-lg" type="text" name="nom" value="{{$employe->exists ?$employe->nom:""}}" required>
                    @error('nom')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div data-mdb-input-init class="form-group form-outline">
            <span class="form-label">Prénom</span>
            <input class="form-control form-control-lg" type="text" name="prenom" value="{{$employe->exists ?$employe->prenoms:""}}" required>
            @error('prenom')
                <div class="text-danger">
                    {{ $message }}
                </div>
             @enderror
        </div>
        <div data-mdb-input-init class="form-group form-outline">
            <span class="form-label">Corps</span>
            <select class="form-control form-control-lg" name="corps" required>
                <option>Civils</option>
                <option>Militaires</option>
            </select>
            <span class="select-arrow"></span>
            @error('corps')
                <div class="text-danger">
                    {{ $message }}
                </div>
             @enderror
        </div>
        <div data-mdb-input-init  class="form-group form-outline">
            <span class="form-label">Structure</span>
            <select class="form-control form-control-lg" name="structure" required>
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
        <div class="d-flex justify-content-start gap-2 mt-4">
            <button class="btn btn-primary">{{$employe->exists ? 'Modifier':'Créer'}}</button>
            <a href="{{route('dashboard.personnel.index')}}" class="btn btn-warning">Annuler</a>
        </div>

    </form>
@endsection
