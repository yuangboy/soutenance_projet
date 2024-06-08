<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     @extends("frenteprati.aside.pratiaside")
    <div class="container">
    <div class="row">
        <div class="col-lg-4"><img src="{{ asset('assets/img/logoSoutenace.png')}}" alt=""></div>
        <div class="col-lg-4"><h1>L'Hôpital Général de Djiri</h1></div>
        <div class="col-lg-4">Républque du Congo</div>
    </div><br>
    <div class="row">
        <div class="col-lg-4"><p><strong></strong> </p></div>
        <div class="col-lg-4"><p><strong>Ordonnance:</strong> </p></div>
        <div class="col-lg-4"><p><strong></strong> </p></div>
    </div><br><br>
    <div class="row">
        <div class="col-lg-8"><p><strong>M. ou Mme:</strong> {{ $ordonnance->patient->prenom }}</p></div>
        <div class="col-lg-4"><h1></h1></div>
    </div><br>
    <div class="row">
        <div class="col-lg-12"><p><strong>Médicaments:</strong> {{ $ordonnance->medicaments }}</p></div>
    </div><br>
    <div class="row">
        <div class="col-lg-12"><p><strong>Indication:</strong> {{ $ordonnance->instructions }}</p></div>
    </div><br><br>


    <div class="row">
        <div class="col-lg-8"><p><strong>Praticien:</strong> {{ $ordonnance->praticien->prenom }}</p></div>
        <div class="col-lg-4"><h1>Tel:</h1></div>
    </div><br>


    <button onclick="window.print()" class="btn btn-secondary">Imprimer</button>
</div>
</body>
</html>




