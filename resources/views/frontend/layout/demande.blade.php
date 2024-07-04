@extends('frontend.layout')

@section('css')
    <link href="/css/styledemande.css" rel="stylesheet">
@endsection

@section('content')

    <div class="container py-5 bg-dark" style="padding-top: 100px">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif


        <form action="{{route('layout.newdemande')}}" method="post">
            @csrf
            <h2 class="mb-3 text-uppercase text-center font-weight-bold">Formulaire de congés</h2>

            <div class="form-group mb-4">
                <label for="reason" class=" font-weight-bold">Motif du congé</label>
                <input type="text" class="form-control" name="reason" id="reason" required placeholder="Une petite description">
                @error('reason')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="leave-period" class="font-weight-bold">Période de congé</label>
                <input class="form-control" type="text" name="leave-period" id="leave-period" required placeholder="Nombre de jours demandés">
                @error('leave-period')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="start-date" class="font-weight-bold">Date début congé</label>
                <input type="date" class="form-control" name="start-date" id="start-date" min="{{ date('Y-m-d') }}" required>
                @error('start-date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="end-date"  class="font-weight-bold">Date fin congé</label>
                <input type="date" class="form-control" name="end-date" id="end-date" min="{{ date('Y-m-d') }}" required>
                @error('end-date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="leave-type"  class="font-weight-bold">Type de congé</label>
                <select class="form-control" name="leave-type" id="leave-type" required>
                    @foreach ($typeconges as $typeconge)
                        <option>{{$typeconge->intitule}}</option>
                    @endforeach
                </select>
                @error('leave-type')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-success  btn-block btn-lg mt-4">Soumettre</button>
            </div>
        </form>
    </div>

@endsection



