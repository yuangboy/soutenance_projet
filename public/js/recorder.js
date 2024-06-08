document.addEventListener("DOMContentLoaded", function () {
    let startBtn = document.getElementById("startBtn");
    let stopBtn = document.getElementById("stopBtn");
    let audioFileInput = document.getElementById("audioFile");
    let uploadAudioForm = document.getElementById("uploadAudioForm");

    let mediaRecorder;
    let audioChunks = [];

    startBtn.addEventListener("click", async () => {
        startBtn.disabled = true;
        stopBtn.disabled = false;

        let stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.ondataavailable = (event) => {
            audioChunks.push(event.data);
        };

        mediaRecorder.onstop = () => {
            let audioBlob = new Blob(audioChunks, { type: "audio/wav" });
            let audioUrl = URL.createObjectURL(audioBlob);
            let audio = new Audio(audioUrl);
            audio.play();

            let file = new File([audioBlob], "recording.wav", {
                type: "audio/wav",
            });
            let container = new DataTransfer();
            container.items.add(file);
            audioFileInput.files = container.files;

            uploadAudioForm.submit();
        };

        mediaRecorder.start();
    });

    stopBtn.addEventListener("click", () => {
        startBtn.disabled = false;
        stopBtn.disabled = true;
        mediaRecorder.stop();
        audioChunks = [];
    });
});
