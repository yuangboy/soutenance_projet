<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('pusher/chat.css')}}">
</head>
<body>


    <div class="chat">
        <div class="top">
            {{-- <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.png" alt="Avatar"> --}}
            <p>Rosen Edlin</p>
            <small>Online</small>
        </div>
        <div class="messages">
            @include('pusher.receive',['message'=>'Hey there, how are you? NBSP'])

        </div>
        <div class="bottom">
            <form action="#">
                <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                <button type="submit">Enoyer</button>
            </form>
    </div>

</body>

<script>
    const pusher=new Pusher('{{config('broadcasting.connections.pusher.key')}}',{cluster:'eu'});
    const channel=pusher.subscribe('public');

    //receive messages

    channel.bind('chat',function(data){
        $.post("/pusher/receive", {
            _token: '{{ csrf_token() }}',
            message: data.message
        })

        .done(function(res) {
            $('.messages >  .message').last().after(res);
            $(document).scrollTop($(document).height());
        });
    });

    // Broadcast messages

    $("form").submit(function(event){
        event.preventDefault();

        $.ajax({
            url:"/pusher/broadcast",
            'method':'POST',
            headers: {
                // X-socket-Id: pusher.connection.socket_id
                'X-Socket-Id': pusher.connection.socket_id
            },
            data: {
                _token: '{{ csrf_token() }}',
                message: $('form #message').val(),

            }
        }).done(function(res) {
            $('.messages >  .message').last().after(res);
            $('form #message').val('');
            $(document).scrollTop($(document).height());
        });
    });

</script>

</html>
