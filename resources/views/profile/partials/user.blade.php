@extends('frontend.layouts.front')
@section('body')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ELEVEs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>



        {{--users--}}
        <br><br>
            <div class="container text-center">
                <br>
                <h2>BIENVENU SUR LE DASHBOARD DE GESTION DES UTILISATEURS</h2><br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Mail</th>
                                <th>Mot de passe</th>
                                <th>Rôle</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->password}}</td>
                                                <td>{{$user->role}}</td>
                                                <td>{{$user->status}}</td>
                                                 <td>
                                    <a href="/profile{{ $user->id}}" class="btn btn-info">Modifier</a><br><br>
                                    <a href="/profile/paertials/delete-user-form{{ $user->id}}" class="btn btn-danger">Supprimer</a>
                                </td>
                                            </tr>
                                    @endforeach
                        </tbody>
                    </table>
            </div>
        {{--endeusers--}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
@endsection
