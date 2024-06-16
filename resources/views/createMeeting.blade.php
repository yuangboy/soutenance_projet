<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join or Create Meeting</title>
    <!-- Lien correct vers le fichier CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.js">

    <style>


        #join-btns{
            position: absolute;
            top: 50%;
            left: 36%;
            margin-top:-50px;
            margin-left: -100px;
            font-size: 18px;
            padding: 20px 40px;
        }

        #join-btn1{
            position: absolute;
            top: 50%;
            left: 35%;
            margin-top:-50px;
            margin-left: -100px;
            font-size: 18px;
            padding: 20px 40px;
        }
        #join-btn2{
            position: absolute;
            top: 50%;
            left: 51%;
           margin-top: -50px;
           margin-left: 100px;
           font-size: 18px;
           padding: 20px 40px;
        }

         #tableTable{
            position: absolute;
            top: 64%;
            /* left: 51%; */
            margin-top:-50px;
            margin-left: -100px;
            font-size: 18px;
            padding: 20px 40px;
            color: whitesmoke;
            border-color: #fff;

         }

         #tableTable2{
            position: absolute;
            top: 64%;
            /* left: 51%; */
            /* margin-top:-50px; */
            margin-left: -100px;
            font-size: 18px;
            padding: 20px 40px;
            color: whitesmoke;
            border-color: #fff;
         }

         #linkname{

            position: absolute;
            top: 22%;
            left: 36%;
            margin-top:-50px;
            margin-left: -100px;
            font-size: 18px;
            padding: 20px 40px;
            background-color: #9bcbcd;
         }

         #video-streams{
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(500px,1fr));
            height:90vh;
            width: 1400px;
            margin: 0 auto;
         }


         @media screen and (max-width: 1400px) {
            #video-streams{
                display: grid;
                grid-template-columns: repeat(auto-fit,minmax(200px,1fr));
                width: 95px;
             }
         }


    </style>
</head>
<body>

<input type="text" id="linkUrl" value="" placeholder="Enter Link">
<button id="join-btn1" onclick="joinUserMeeting()">Join User Meeting</button>

@if (Auth::user())
<a href="{{ url('createMeeting') }}"><button id="join-btn2">Create Meeting</button></a>
@endif

<!-- Lien vers la bibliothèque jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<!-- Lien correct vers la bibliothèque Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>




</body>

<script src="https:\\cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script>
    function joinUserMeeting() {
        var link = $('#linkUrl').val();
        if (link.trim() ==   '' || link.length < 1) {
            alert('Please enter the link');
            return;
        } else {
           window.location.href=link;
        }
    }
</script>

</html>
