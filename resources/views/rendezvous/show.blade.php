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
    <h2>Rendez-vous avec {{ $rendezvous->praticien_id == Auth::id() ? $rendezvous->patient->name : $rendezvous->praticien->name }}</h2>
    <a href="{{ route('audio_messages.index', $rendezvous->id) }}">Voir les messages audio</a>
</div>


</body>
</html>
