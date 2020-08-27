@extends('layouts.app')


@section('content')
<div class="container mx-auto text-center">
    <a href="{{route('sondage.createEvent',$sondage)}}" class="btn btn-primary my-3">Ajouter un évènement</a>
    <div class="table-responsive">
        <table class=" table table-striped table-primary">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>%</th>
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
                    <td>{{count($sondage->events->pluck('usersVote'))}}</td>
                    <td>
                        @if (!$sondage->users->contains(Auth::id()))
                        <a href="{{route('sondage.voter',[$sondage,$event])}}" class="btn btn-success">Voter
                        </a>
                        @elseif(Auth::user()->eventsVote->contains($event->id))
                        <i class="fa fa-check text-success mx-2 fa-2x"></i>
                        @else
                        <i class="fa fa-times text-danger mx-2 fa-2x"></i>
                        @endif
                        <a href="{{route('event.edit',$event)}}" class="btn btn-warning">
                            <i class="fa fa-pen"></i> Editer
                        </a>
                        <form action="{{route('event.destroyAdmin',$event)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger mt-2" type="submit"><i class="fa fa-trash"></i>
                                Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('js')
<script src="{{asset('js/app.js')}}"></script>
@endsection
