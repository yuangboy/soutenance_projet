<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('agoraVideo/main.js')}}"> --}}
    <link rel="stylesheet" href="{{asset('agoraVideo/main.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7x0u6u1g6l+0t8soO4+9h3uF3r5D5zy5c1m" crossorigin="anonymous" defer></script> --}}

    <title>Video Stream</title>
</head>
<body>


    <input type="text" id="linkUrl" value="{{url('joinMeeting')}}/{{$meeting->url}}">
    {{-- <button id="join-btn" style="display: none"></button> --}}
    <button id="join-btn">Join Stream</button>
    <button id="join-btns" onclick="copyLink()">Copy Link</button>

    {{-- Meeting Instance --}}

    <div id="stream-wrapper" style="height: 100%; display:block">
        <div id="video-streams"></div>
        <div id="stream-controls">
            <button id="leave-btn">Leave Stream</button>
            <button id="mic-btn">Mic On</button>
            <button id="camera-btn">Camera On</button>
            <button id="rec-btn">Rec off</button>
        </div>
    </div>

    <input id="appid" type="text" type="hidden" value="{{$meeting->app_id}}" readonly>
    <input id="token" type="text" type="hidden" value="{{$meeting->token}}" readonly>
    <input id="channel" type="text" type="hidden" value="{{$meeting->channel}}" readonly>
    <input id="urlId" type="text" type="hidden" value="{{$meeting->url}}" readonly>


    {{-- <input id="timer" type="text" type="hidden" value="0"> --}}
    <input id="user_meeting" type="text" type="hidden" value="0">
    <input id="user_permission" type="text" type="hidden" value="0">
    {{-- <input id="rec_user" type="text" type="hidden" value="0"> --}}



</body>
{{-- <script src="{{asset('agoraVideo/AgoraRTC_N-4.7.3.js')}}"></script> --}}
{{-- <script src="{{asset('agoraVideo/main.js')}}"></script> --}}
<script src="{{asset('agoraVideo/AgoraRTC_N-4.21.0.js')}}"></script>
{{-- <script src="{{asset('agoraVideo/index.js')}}"></script> --}}
<script src="{{asset('agoraVideo/index.js')}}"></script>
<script src="{{asset('agoraVideo/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('agoraVideo/vendor/jquery-3.4.1.min.js')}}"></script>

</html>
