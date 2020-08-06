@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <form action="{{route('event.updateAdmin',$event)}}" method="POST">
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
            <input type="text" value="{{old('titre',$event->title)}}" class="form-control" id="titre" name="titre" placeholder="Titre de l'évènement">
        </div>

        <div class="form-group">
            <label for="debut">Début de l'évènement</label>
            @error('debut')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <input type="date" value="{{old('debut',$event->start->format('Y-m-d'))}}" class="form-control" id="debut" name="debut" placeholder="">
        </div>
        <div class="form-group">
            <label for="debut_heure">Heure de début de l'évènement</label>
            @error('debut_heure')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <input type="time" value="{{old('debut_heure',$event->start->format('H:i'))}}" class="form-control" id="debut_heure" name="debut_heure" placeholder="">
        </div>
        <div class="form-group">
            <label for="fin">Fin de l'évènement</label>
            @error('fin')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <input type="date" value="{{old('fin',$event->end->format('Y-m-d'))}}" class="form-control" id="fin" name="fin" placeholder="">
        </div>
        <div class="form-group">
            <label for="fin_heure">Heure de fin de l'évènement</label>
            @error('fin_heure')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <input type="time" value="{{old('fin_heure',$event->start->format('H:i'))}}" class="form-control" id="fin_heure" name="fin_heure" placeholder="">
        </div>


        <div class="text-center">
            <button type="submit" class="btn btn-primary">Editer</button>
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
