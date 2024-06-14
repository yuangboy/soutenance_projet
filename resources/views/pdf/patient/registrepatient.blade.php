<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .entete {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }


        .logo img {
            width: 70px;
            height: 70px;
        }

        .nation {
            display: flex;
            align-items: center;
        }

        .devise {
            margin-left: 20px;
        }

        .devise h5 {
            font-family: monospace;
            margin: 0;
            font-size: 14px;
        }

        .devise h3 {
            font-family: monospace;
            margin: 0;
            font-size: 18px;
        }

        .titre {
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 24px;
            font-weight: bold;
            color:rgb(21, 81, 232);
        }

        .registre p {
            margin: 5px 0;
            font-size: 18px;
        }

        .registre span {
            font-weight: bold;
        }

        .qr {
            text-align: right;
            margin-bottom: 20px;
        }

        .qrcode img {
            width: 150px;
            height: 150px;
        }

        .footer {
            border-top: 1px solid #000;
            padding-top: 20px;
            text-align: center;
        }

        .footer p {
            margin: 10px 0;
        }

        .stock-logo{
            display: flex;
            justify-content: space-around;
            width:99%;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="entete">
            {{-- <div class="logo"> --}}
                {{-- <img src="{{ asset('frontend/assets/img/logoSoutenace.png') }}" alt="Logo"> --}}
                {{-- <img src="{{storage_path('app/public/images/logoSoutenace.png')}}" alt=""> --}}
            {{-- </div> --}}
            <div class="nation">

                <div>
                    {{-- <h2>{{ $image->name }}</h2> --}}
                    {{-- <img src="data:image/jpeg;base64,{{ $image->image }}" alt="User Image"> --}}
                </div>
                @foreach ($images as $image)
                <div class="stock-logo">
                    <div class="logo">
                        {{-- <img src="{{ asset('assets/img/logoSoutenace.png') }}" alt="Logo"> --}}
                        <img src="data:image/jpeg;base64,{{ $image->image }}" alt="User Image">
                    </div>
                    <div class="logo">
                        <div class="devise">
                            <h5>Unité*Travail*Progrès</h5>
                            <h3>N°<span>{{$patient->matricule}}</span></h3>
                         </div>

                        {{-- <img src="{{ asset('assets/img/logoSoutenace.png') }}" alt="Logo"> --}}
                        {{-- <img src="data:image/jpeg;base64,{{ $image->image }}" alt=" Image"> --}}
                    </div>
                </div>
                <br>
                @endforeach

            </div>
        </div>

        <h2 class="titre">Fiche Patient</h2>
        <div class="registre">
            <style>p{margin-top: 5px} </style>
            <p><span class="nom">{{ $user->name }}</span> <span class="prenom">{{ $patient->prenom }}</span></p>
            <p>Né à {{ $patient->lieuNaiss }}, Le <span>{{ $patient->dateNaiss }}</span></p>
            <p>Genre: {{ $patient->genre }}</p>
            <p>Pays d'origine: {{ $patient->nationalite }}</p>
            <p>Profession: {{ $patient->profession }}</p>
            <p>Tel: <span>{{ $patient->tel }}</span></p>
            <p>email: {{ $user->email }}</p>
            <p>Adresse: <span>{{ $patient->adresse }}</span></p>
        </div>
        <br>
        <br>
        <div class="qr">
            <div class="qrcode">
                {!! DNS2D::getBarcodeHTML($patient->matricule, 'QRCODE', 5, 5) !!}
            </div>
        </div>
        <br><br>

        <div class="footer">
            <p>En foi de quoi ce formulaire atteste <br> l'exactitude des informations fournies</p>
        </div>
    </div>
</body>
</html>
