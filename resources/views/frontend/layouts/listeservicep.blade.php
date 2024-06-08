@extends('frontend.layouts.front')
@section('body')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ELEVE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>

        {{--services--}}
            <div class="container text-center">
                <br>
                <h3>BIENVENU SUR LA LISTE DE SERVICES </h3><br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom service</th>
                                <th>Description du service</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($service as $services)
                                            <tr>
                                                <td>{{$services->id}}</td>
                                                <td>{{$services->libelle}}</td>
                                                <td>{{$services->description}}</td>
                                            </tr>
                                    @endforeach
                        </tbody>
                    </table>
            </div>

        {{-- Fin service --}}

        {{--users--}}

        {{--endeusers--}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
@endsection
