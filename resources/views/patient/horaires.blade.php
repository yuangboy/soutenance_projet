@extends('frontend.layouts.front2')
@section('body')
<!DOCTYPE html>
<html>
<head>
    <title>Prendre rendez-vous</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1 style="text-align: center">Horaires disponibles</h1>
    @if($horaires->isEmpty())
        <p>Il n'y a pas d'horaires disponibles pour ce praticien.</p>
    @else
        <ul>
            @foreach($horaires as $horaire)
                <li>
                    {{ $horaire->start_time }}
                    <form action="{{ route('patient.requestAppointment', $horaire->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Solliciter un rendez-vous</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
</body>
</html>
@endsection
