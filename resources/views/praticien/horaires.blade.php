<!DOCTYPE html>
<html>
<head>
    <title>Gérer les horaires</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Gérer les horaires</h1>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('horaires.create') }}">Créer un nouvel horaire</a>

        <h2>Horaires</h2>
        <ul>
            @forelse ($horaires as $horaire)
                <li>
                    <p>Début : {{ $horaire->start_time }}</p>
                    <p>Fin : {{ $horaire->end_time }}</p>
                    <p>Disponible : {{ $horaire->is_available ? 'Oui' : 'Non' }}</p>
                    <form action="{{ route('horaires.destroy', $horaire->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            @empty
                <li>Aucun horaire défini</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
