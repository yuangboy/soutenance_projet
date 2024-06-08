<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ASSURANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
        }
        .container-fluid {
            height: 100%;
        }
        .row {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        form {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
  </head>
  <body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-center mb-4">AJOUTER UN Service</h1>
                <hr>

                @if(session ('status'))
                    <div class="alert alert-success">
                        {{ session ('status') }}
                    </div>
                @endif
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>

                <form action="/ajouterAssurance/traitement" method="post" class="vstack gap-3">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="form-label">L'identifiant de l'assurance</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="nomAssure" class="form-label">Nom de l'Assuré</label>
                        <input type="text" class="form-control" id="nomAssure" name="nomAssure">
                    </div>
                    <div class="mb-3">
                        <label for="prenomAssure" class="form-label">Prénom Assuré</label>
                        <input type="text" class="form-control" id="prenomAssure" name="prenomAssure">
                    </div>
                    <div class="mb-3">
                        <label for="numAss" class="form-label">Matricule assurance</label>
                        <input type="text" class="form-control" id="numAss" name="numAss">
                    </div>
                    <div class="mb-3">
                        <label for="libelle" class="form-label">Libelle Assuré</label>
                        <input type="text" class="form-control" id="libelle" name="libelle">
                    </div>
                    <div class="mb-3">
                        <label for="tauxPaye" class="form-label">Taux paiement assurance</label>
                        <input type="text" class="form-control" id="tauxPaye" name="tauxPaye">
                    </div>
                    <div class="mb-3">
                        <label for="beneficiaier" class="form-label">Nom bénéficiaire</label>
                        <input type="text" class="form-control" id="beneficiaier" name="beneficiaier">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Ajouter une assurance</button> <br><br>
                    <a href="/partenaireassurance" class="btn btn-danger w-100">Revenir à la liste des assurances</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
