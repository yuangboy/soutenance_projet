@extends('frontend.layouts.front')
@section('body')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ELEVE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  {{-- <style>
    .form-container {
            position: relative;
            width: 300px; /* ajustez la largeur selon vos besoins */
            margin: 0 auto; /* centrer les formulaires horizontalement */
        }
    .form {
            display: flex;
            position: relative;
            width: 300px; /* ajustez la largeur du formulaire selon vos besoins */
            margin: 0 auto; /* centrer le formulaire horizontalement */
            padding-top: 100px; /* ajustez cet espacement pour l'image en-tête */
            border: 5px solid rgb(44, 108, 13); /* bordure pour le formulaire */
            border-radius: 5px; /* arrondir les coins du formulaire */
            background-color: #ffff; /* couleur de fond pour le formulaire */
            align-items: center;
            justify-content: center;
            text-align: center;

        }

    .entete-image {
            position: absolute;
            top: -50px; /* ajustez cette valeur pour l'overlap */
            left: 0;
            width: 50%;
            height: 50%; /* ajustez la hauteur de l'image en-tête selon vos besoins */
             /* ajuster la taille de l'image pour couvrir la zone définie */
            border-top-left-radius: 5px; /* arrondir les coins supérieurs gauche et droit */
            border-top-right-radius: 5px;
            z-index: 1; /* déplacer l'image en arrière-plan */
        }
        .formulaire + .formulaire {
            margin-top: 20px;
        } --}}
  </style>

  <body>

        {{-- <div class="container text-center">

            <hr>
            <!--<a href="/ajouter" class = "btn btn-primary" >Ajouter un elève</a>-->
            <hr>
                    @if(session ('status'))
                        <div class="alert alert-succes">
                            {{ session ('status') }}
                        </div>
                    @endif
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class = "alert alert-danger">
                                {{ $error}}
                            </li>
                        @endforeach
                    </ul>



                    <h1>Liste des Services Médical de l'Hopital Général de Djiri </h1> <br><br><br>
                        @foreach($service as $services)

                                <div class="form">
                                        <img src="{{ asset('frontend/assets/img/logoSoutenace.png')}}" width="70px" alt="Image de formulaire" class="entete-image">
                                        <h2>{{ $services->libelle }}</h2><br><br><br>
                                        <button>Voir plus</button>
                                 </div> <br><br>
                        @endforeach


        </div> --}}


        {{-- propre --}}

        <style>
            .table{
                margin-top: 20px;
                margin-left: auto;
                margin-right:auto;
                border-collapse: collapse;
                width: 80%;

            }
            tr{
                display: flex;

            }
            .table :is(td,th){
                border: 1px solid #000;
                flex: 1;
            }
        </style>

                                @forelse ($service as $services)
                                    <table class="table">

                                        <tr>
                                            <th>Id</th>
                                            <th>Nom service</th>

                                        </tr>
                                        <tr>
                                            <td>{{$services->id}}</td>
                                            <td>{{$services->libelle}}</td>
                                        </tr>

                                    </table>

                                @empty
                                <h1>Aucun service</h1>


                                @endforelse

        {{-- Fin propre --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
@endsection
