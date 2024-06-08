<!-- resources/views/record-audio.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Enregistrement Audio</title>
</head>
<body>
    <h1>Enregistrer un audio</h1>
    <button id="startBtn">Commencer l'enregistrement</button>
    <button id="stopBtn" disabled>Arrêter l'enregistrement</button>
    <audio id="audioPlayback" controls></audio>
    <script src="{{ asset('js/recorder.js') }}"></script>
</body>
</html>
r
