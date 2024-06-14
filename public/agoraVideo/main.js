const APP_ID = $('#appid').val();
const TOKEN = $('#token').val();
const CHANNEL = $('#channel').val();
const client = AgoraRTC.createClient({ mode: 'rtc', codec: 'vp8' });
let localTracks = [];
let remoteUsers = {};

let joinAndDisplayLocalStream = async () => {
    client.on('user-published', handleUserJoined);
    client.on('user-left', handleUserLeft);

    let UID = await client.join(APP_ID, CHANNEL, TOKEN, null);
    localTracks = await AgoraRTC.createMicrophoneAndCameraTracks();

    let player = `<div class="video-container" id="user-container-${UID}">
                      <div class="video-player" id="user-${UID}"></div>
                  </div>`;
    document.getElementById('video-streams').insertAdjacentHTML('beforeend', player);
    localTracks[1].play(`user-${UID}`);
    await client.publish([localTracks[0], localTracks[1]]);
};

let joinStream = async () => {
    try {
        await joinAndDisplayLocalStream();
        $('#timer').val(1);
        RecordTime();
    } catch (err) {
        alert('Link has expired, please contact the host provider.');
    }
};

let handleUserJoined = async (user, mediaType) => {
    remoteUsers[user.uid] = user;
    await client.subscribe(user, mediaType);

    if (mediaType === 'video') {
        let player = document.getElementById(`user-container-${user.uid}`);
        if (player != null) {
            player.remove();
        }
        player = `<div class="video-container" id="user-container-${user.uid}">
                      <div class="video-player" id="user-${user.uid}"></div>
                  </div>`;
        document.getElementById('video-streams').insertAdjacentHTML('beforeend', player);
        user.videoTrack.play(`user-${user.uid}`);
    }

    if (mediaType === 'audio') {
        user.audioTrack.play();
    }
};

let handleUserLeft = async (user) => {
    delete remoteUsers[user.uid];
    document.getElementById(`user-container-${user.uid}`).remove();
};

let leaveAndRemoveLocalStream = async () => {
    for (let i = 0; i < localTracks.length; i++) {
        localTracks[i].stop();
        localTracks[i].close();
    }
    await client.leave();

    document.getElementById('join-btn').style.display = 'block';
    document.getElementById('stream-controls').style.display = 'none';
    document.getElementById('video-streams').innerHTML = '';
    document.getElementById('dataTable').style.display = 'block';
};

let toggleMic = async (e) => {
    if (localTracks[0].muted) {
        await localTracks[0].setMuted(false);
        e.target.innerText = 'Mic on';
        e.target.style.backgroundColor = 'cadetblue';
    } else {
        await localTracks[0].setMuted(true);
        e.target.innerText = 'Mic off';
        e.target.style.backgroundColor = '#EE4B2B';
        $('#rec_user').val(0);
    }
};

let toggleCamera = async (e) => {
    if (localTracks[1].muted) {
        await localTracks[1].setMuted(false);
        e.target.innerText = 'Camera on';
        e.target.style.backgroundColor = 'blue';
    } else {
        await localTracks[1].setMuted(true);
        e.target.innerText = 'Camera off';
        e.target.style.backgroundColor = '#EE4B2B';
    }
};

let toggleRecording = async (e) => {
    if ($('#rec_user').val() == 0) {
        await startRecording();
        e.target.innerText = 'Rec on';
        e.target.style.backgroundColor = 'blue';
        $('#rec_user').val(1);
    } else {
        var meetingId = $('#user_meeting').val();
        if (meetingId == 0) {
            alert('Please wait while we are fetching recording ID...');
            return;
        }
    }
};

document.getElementById('join-btn').addEventListener('click', joinStream);
document.getElementById('leave-btn').addEventListener('click', leaveAndRemoveLocalStream);
// document.getElementById('leave-join').addEventListener('click', leaveAndRemoveLocalStream);
document.getElementById('mic-btn').addEventListener('click', toggleMic);
document.getElementById('camera-btn').addEventListener('click', toggleCamera);
document.getElementById('rec-btn').addEventListener('click', toggleRecording);
