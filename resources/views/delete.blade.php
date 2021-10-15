@extends('layout')
@section('content')
   <h1>Confirmation de la suppression de l'article n°{{$article->$id}}</h1>
    <ul class="list-group">
        <li class="list-group-item">Titre :{{$article->titre}}</li>
        <li class="list-group-item">Auteur : {{$article->auteur}}</li>
    </ul>

    <form action="" method="post">
        @csrf
        <button type="submit" class="btn btn-success">confirm</button>
        <a href="{{route('articles')}}}" class="btn btn-danger">Annuler</a>
    </form>
@endsection
