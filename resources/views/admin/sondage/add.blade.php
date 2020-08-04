@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <form action="{{route('sondage.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Titre</label>
            @error('titre')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
        <input type="text" value="{{old('titre')}}" class="form-control" id="titre" name="titre" placeholder="Titre du sondage">
        </div>

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