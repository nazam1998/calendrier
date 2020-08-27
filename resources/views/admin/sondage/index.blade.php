@extends('layouts.app')


@section('content')
<div class="container mx-auto text-center">
    <a href="{{route('sondage.create')}}" class="btn btn-primary my-3">Ajouter Sondage</a>
    <div class="table-responsive">


        <table class=" table table-striped table-primary">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sondages as $sondage)
                <tr>
                    <td>{{$sondage->id}}</td>
                    <td>{{$sondage->title}}</td>
                    <td>
                        <a href="{{route('sondage.show',$sondage)}}" class="btn btn-success">
                            <i class="fa fa-eye"></i> Voir évènements
                        </a>
                        <a href="{{route('sondage.edit',$sondage)}}" class="btn btn-warning">
                            <i class="fa fa-pen"></i> Editer
                        </a>
                        <form action="{{route('sondage.destroy',$sondage)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger mt-2"><i class="fa fa-trash"></i> Supprimer</button>
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
