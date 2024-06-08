<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Conversation</title>
</head>
<body>
    <h1>Conversation</h1>
    <ul>
        @forelse($conversation->audioMessages as $audioMessage)
            <li>
                <!-- Affichage du lecteur audio avec un contrôleur -->
                <audio controls>
                    <source src="{{ $audioMessage->audio_url }}" type="audio/wav">
                    Votre navigateur ne supporte pas l'élément audio.
                </audio>
                <p>Envoyé par : {{ $audioMessage->sender->name }} à {{ $audioMessage->created_at }}</p>
            </li>
        @empty
            <li>Aucun message audio trouvé.</li>
        @endforelse
    </ul>
    <button id="startBtn">Commencer l'enregistrement</button>
    <button id="stopBtn" disabled>Arrêter l'enregistrement</button>
    <form id="uploadAudioForm" action="{{ route('audio.store', $conversation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="audio" id="audioFile" hidden>
        <button type="submit">Télécharger</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let startBtn = document.getElementById('startBtn');
            let stopBtn = document.getElementById('stopBtn');
            let audioFileInput = document.getElementById('audioFile');
            let uploadAudioForm = document.getElementById('uploadAudioForm');

            let mediaRecorder;
            let audioChunks = [];

            startBtn.addEventListener('click', async () => {
                startBtn.disabled = true;
                stopBtn.disabled = false;

                let stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                mediaRecorder = new MediaRecorder(stream);

                mediaRecorder.ondataavailable = event => {
                    audioChunks.push(event.data);
                };

                mediaRecorder.onstop = () => {
                    let audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                    let audioUrl = URL.createObjectURL(audioBlob);
                    let audio = new Audio(audioUrl);
                    audio.play();

                    let file = new File([audioBlob], 'recording.wav', { type: 'audio/wav' });
                    let container = new DataTransfer();
                    container.items.add(file);
                    audioFileInput.files = container.files;

                    uploadAudioForm.submit();
                };

                mediaRecorder.start();
            });

            stopBtn.addEventListener('click', () => {
                startBtn.disabled = false;
                stopBtn.disabled = true;
                mediaRecorder.stop();
                audioChunks = [];
            });
        });
    </script>
</body>
</html>
