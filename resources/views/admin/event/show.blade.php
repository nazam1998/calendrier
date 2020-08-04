@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">{{$event->title}}</h5>
            <p class="card-text">
            <p>Début : {{$event->start->format('d/m/Y H:i')}}</p>
            <p>Fin : {{$event->end->format('d/m/Y H:i')}}</p>
            <p class="text-secondary">Proposé par : {{$event->user->name}}</p>
            </p>
            <a href="/" class="btn btn-primary">Go back</a>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('js')
<script src="{{asset('js/app.js')}}"></script>
@endsection
