<!-- resources/views/record-video.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Video</title>
</head>
<body>
    <h1>Record a Video</h1>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="startButton">Start Recording</button>
    <button id="stopButton" disabled>Stop Recording</button>
    <video id="recordedVideo" controls></video>
    <form id="uploadForm" action="/upload-video" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="video" id="videoInput">
        <button type="submit">Upload Video</button>
    </form>

    <script>
        const videoElement = document.getElementById('video');
        const recordedVideo = document.getElementById('recordedVideo');
        const startButton = document.getElementById('startButton');
        const stopButton = document.getElementById('stopButton');
        const uploadForm = document.getElementById('uploadForm');
        const videoInput = document.getElementById('videoInput');

        let mediaRecorder;
        let recordedChunks = [];

        startButton.addEventListener('click', async () => {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });

            videoElement.srcObject = stream;
            videoElement.play();

            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = function (e) {
                recordedChunks.push(e.data);
            };

            mediaRecorder.onstop = function () {
                const blob = new Blob(recordedChunks, {
                    type: 'video/webm'
                });

                recordedVideo.src = URL.createObjectURL(blob);
                recordedVideo.controls = true;
                recordedVideo.play();

                const formData = new FormData();
                formData.append('video', blob, 'recorded-video.webm');

                fetch('/upload-video', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Video uploaded:', data);
                    // Rediriger ou afficher un message de succès
                })
                .catch(error => {
                    console.error('Error uploading video:', error);
                    // Gérer les erreurs
                });
            };

            mediaRecorder.start();
            startButton.disabled = true;
            stopButton.disabled = false;
        });

        stopButton.addEventListener('click', () => {
            mediaRecorder.stop();
            startButton.disabled = false;
            stopButton.disabled = true;
        });
    </script>
</body>
</html>
