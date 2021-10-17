@extends('layout')
@section('content')
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th colspan="2">Listes des utilisateurs</th>
        </tr>
        <tr>
            <td>Nom</td>
            <td>Email</td>
            <td colspan="3" class="text-center">Action</td>

        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td> <a href="{{route("users.delete",["id"=>$user->id])}}" class="btn btn-primary">Supprimer</a></td>
                        <td>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Droits
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route("users.auteur",["id"=>$user->id])}}">Auteur</a>
                                <a class="dropdown-item" href="{{route("users.moder",["id"=>$user->id])}}">Modérateur</a>
                                <a class="dropdown-item" href="{{route("users.admin",["id"=>$user->id])}}">Administrateur</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </td>
                </tr>
        @endforeach
        </tbody>
    </table>

@endsection

