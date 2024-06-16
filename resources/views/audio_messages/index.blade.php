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
    <h2>Audio Messages for Rendezvous #{{ $rendezvousses->id }}</h2>
    <div>
        @foreach($audioMessages as $audioMessage)
        <div>
            <p>{{ $audioMessage->sender->name }}</p>
            <audio controls>
                <source src="{{ Storage::url($audioMessage->file_path) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
        @endforeach
    </div>
    <form action="{{ route('audio_messages.store', $rendezvousses->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="audio">Send an audio message</label>
            <input type="file" name="audio" id="audio" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
</body>
</html>
