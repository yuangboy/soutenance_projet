<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ELEVE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

        <div class="container ">
            <div class="row">
                <h1>MODIFIER UN ASSURE</h1>
                <hr>

                    @if(session ('status'))
                <div class="alert alert-success">
                    {{ session ('status') }}
                </div>
                @endif


                <form action="/updateAssurance/traitement" method="POST" class="vstack gap-3">
                @csrf
                <input type="text" name="id" style="display:none;" value="{{ $assurances->id}}">
                 <div class="mb-3">
                    <label for="nom">Nom Assuré</label>
                    <input type="text" class="form-control" id="nomAssure" name="nomAssure" value="{{ $assurances->nomAssure}}">
                </div>
                <div class="mb-3">
                    <label for="prenom">Prénom Assuré</label>
                    <input type="text" class="form-control" id="prenomAssure" name="prenomAssure"  value="{{ $assurances->prenomAssure}}">
                </div>
                <div class="mb-3">
                    <label for="nom">Numéro Assurance</label>
                    <input type="text" class="form-control" id="numAss" name="numAss" value="{{ $assurances->numAss}}">
                </div>
                <div class="mb-3">
                    <label for="prenom">Libelle assurance</label>
                    <input type="text" class="form-control" id="libelle" name="libelle"  value="{{ $assurances->libelle}}">
                </div>
                <div class="mb-3">
                    <label for="prenom">Taux payement assurance</label>
                    <input type="text" class="form-control" id="tauxPaye" name="tauxPaye"  value="{{ $assurances->tauxPaye}}">
                </div>
                <div class="mb-3">
                    <label for="nom">Beneficiaire assurance</label>
                    <input type="text" class="form-control" id="beneficiaier" name="beneficiaier" value="{{ $assurances->beneficiaier}}">
                </div>


                <button type="submit" class="btn btn-primary" action="">Modifier un service</button> <br><br>
                <a href="/frontad" class="btn btn-danger">Revenir à la liste ds services</a>
            </form>


        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
