@extends('frontend.layouts.front')
@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <br>
    <h1 style="text-align: center">Praticiens du service {{ $service->libelle }}</h1> <br>
    @if($service->praticiens->isEmpty())
        <p>Il n'y a pas de praticien dans ce service.</p><br><br>
    @else
        <ul>
            @foreach($service->praticiens as $praticien)
                <li style="text-align: center">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>
                                    Nom praticien
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $praticien->prenom }}</td>
                                <td>
                                    <a href="{{ route('patient.horaires', $praticien->id) }}" class="btn btn-primary" style="background-color:rgb(33, 48, 67)">
                                    Voir Horaires</a>
                                    <a href="{{ route('admin.services.index') }} " style="background-color:rgb(33, 48, 67)" class="btn btn-secondary">Retour</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </li>
            @endforeach
        </ul>
    @endif



</body>
</html>
@endsection
