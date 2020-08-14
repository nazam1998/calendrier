@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <form action="{{route('sondage.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Titre</label>
            @error('titre')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <input type="text" value="{{old('titre',$sondage->titre)}}" class="form-control" id="titre" name="titre"
                placeholder="Titre du sondage">
        </div>
        <label for="">Etat du sondage</label>
        @error('etat')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @enderror
        <select id="etat" name="etat" class="custom-select  mb-3">
            @foreach ($etats as $etat)

            @if (old('etat',$sondage->etat_id)==$etat->id)

            <option selected value="{{$etat->id}}">{{$etat->etat}}</option>

            @else

            <option value="{{$etat->id}}">{{$etat->etat}}</option>

            @endif
            @endforeach
        </select>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{asset('js/calendar.js')}}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
