<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h1>Audios</h1>

    <form action="{{ route('audios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="receiver_id">Choisir un patient:</label>
            <select name="receiver_id" id="receiver_id" class="form-control">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="audio">Choisir un fichier audio:</label>
            <input type="file" class="form-control" name="audio" required>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

    <h2>Liste des Audios</h2>
    <ul>
        @foreach ($audios as $audio)
            <li>
                {{ $audio->sender->name }} -> {{ $audio->receiver->name }}
                <a href="{{ route('audios.play', $audio->id) }}">Écouter</a>
            </li>
        @endforeach
    </ul>
</div>


</body>
</html>
