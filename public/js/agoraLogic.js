import AgoraRTC from "agora-rtc-sdk-ng";

let rtc = {
    localAudioTrack: null,
    client: null
};

let options = {
    appId: "cd4ff9b792d648f98ed539875278c3a6",
    channel: "agora7464",
    token: "0",
    uid: 123456,
};

async function startBasicCall() {
    rtc.client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });

    rtc.client.on("user-published", async (user, mediaType) => {
        await rtc.client.subscribe(user, mediaType);
        console.log("subscribe success");

        if (mediaType === "audio") {
            const remoteAudioTrack = user.audioTrack;
            remoteAudioTrack.play();
        }
    });

    rtc.client.on("user-unpublished", async (user) => {
        await rtc.client.unsubscribe(user);
    });

    window.onload = function () {
        document.getElementById("join").onclick = async function () {
            await rtc.client.join(options.appId, options.channel, options.token, options.uid);
            rtc.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
            await rtc.client.publish([rtc.localAudioTrack]);
            console.log("publish success!");
        }

        document.getElementById("leave").onclick = async function () {
            rtc.localAudioTrack.close();
            await rtc.client.leave();
        }
    }
}

startBasicCall();
