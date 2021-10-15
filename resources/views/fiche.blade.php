@extends('layout')
@section('content')
   <h1>Détails de l'article </h1>
    <ul class="list-group">
        <li class="list-group-item">Numéro :{{$article->id}}</li>
        <li class="list-group-item">Titre :{{$article->title}}</li>
        <li class="list-group-item">Contenu : {{$article->contenu}}</li>
    </ul>
@endsection
