@extends('layout')
@section('content')
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th colspan="2">Listes articles</th>
            <th colspan="4"><a class="btn btn-secondary" href="{{url('/articles/ajouter')}}">Ajouter</a>
        </tr>
        <tr>
            <td>Titre</td>
            <td>Auteur</td>
            <td colspan="3" class="text-center">Action</td>

            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
            <td>Status</td>
                @endif
        </tr>
        </thead>
        <tbody>

        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->contenu }}</td>
               <td> <a href="{{ route("articles.show",[ "id" => $article->id]) }}" class="btn btn-primary"> voir</a> </td>
              <td> <a href="{{route("articles.edit",["id"=>$article->id])}}" class="btn btn-primary">Modifier</a></td>

                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin' || \Illuminate\Support\Facades\Auth::user()->role == 'aut')
                     <td> <a href="{{route("articles.delete",["id"=>$article->id])}}" class="btn btn-primary">Supprimer</a></td>
                    <td>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Status
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Enabled</a>
                                <a class="dropdown-item" href="#">Disabled</a>
                                <div class="dropdown-divider"></div>
                            </div>
                    </td>
                    @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
