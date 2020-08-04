@extends('layouts.app')


@section('content')
<div class="container mx-auto text-center">
    <a href="{{route('sondage.createEvent',$sondage)}}" class="btn btn-primary my-3">Ajouter un évènement</a>
    <table class=" table table-striped table-primary">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Valide</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sondage->events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{{$event->start->format('d/m/Y H:i:s')}}</td>
                <td>{{$event->end->format('d/m/Y H:i:s')}}</td>
                <td><i class="fa {{$event->valide?'fa-check text-success':'fa-times text-danger'}} fa-2x"></i></td>
                <td>
                    @if ($event->valide)

                    <a href="{{route('event.invalider',$event)}}" class="btn btn-danger">Invalider
                    </a>
                    @else
                    <a href="{{route('event.valider',$event)}}" class="btn btn-success">Valider
                    </a>
                    @endif
                    <a href="{{route('event.edit',$event)}}" class="btn btn-warning">
                        <i class="fa fa-pen"></i> Editer
                    </a>
                    <form action="{{route('event.destroyAdmin',$event)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger mt-2"><i class="fa fa-trash"></i>Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('js')
<script src="{{asset('js/app.js')}}"></script>
@endsection
