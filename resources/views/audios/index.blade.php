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
    <h2>Messages audio pour le rendez-vous #{{ $rendezvous->id }}</h2>
    <div>
        @foreach($audioMessages as $audioMessage)
        <div>
            <p>{{ $audioMessage->sender->name }}</p>
            <audio controls>
                <source src="{{ route('audio_messages.play', $audioMessage->id) }}" type="audio/mpeg">
                Votre navigateur ne supporte pas l'élément audio.
            </audio>
            @if(Auth::id() == $audioMessage->sender_id)
            <form action="{{ route('audio_messages.destroy', $audioMessage->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            @endif
        </div>
        @endforeach
    </div>
    <form action="{{ route('audio_messages.store', $rendezvous->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="audio">Envoyer un message audio</label>
            <input type="file" name="audio" id="audio" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>


</body>
</html>
