<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Horaires disponibles</h1>
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
