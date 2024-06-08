<!DOCTYPE html>
<html>
<head>
    <title>Prendre rendez-vous</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Prendre rendez-vous</h1>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <h2>Horaires disponibles</h2>
        <ul>
            @forelse ($horaires as $horaire)
                @if ($horaire->is_available)
                    <li>
                        <p>Début : {{ $horaire->start_time }}</p>
                        <p>Fin : {{ $horaire->end_time }}</p>
                        <a href="{{ route('rendezvous.request', $horaire->id) }}">Solliciter un rendez-vous</a>
                    </li>
                @endif
            @empty
                <li>Aucun créneau disponible</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
