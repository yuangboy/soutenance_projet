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
                <h1>MODIFIER UN ELEVE</h1>
                <hr>

                    @if(session ('status'))
                <div class="alert alert-success">
                    {{ session ('status') }}
                </div>
                @endif


                <form action="/update/traitement" method="POST" class="vstack gap-3">
                @csrf
                <input type="text" name="id" style="display:none;" value="{{ $services->id}}">
                 <div class="mb-3">
                    <label for="nom">Libelle</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $services->libelle}}">
                </div>
                <div class="mb-3">
                    <label for="prenom">Description</label>
                    <input type="text" class="form-control" id="description" name="description"  value="{{ $services->description}}">
                </div>


                <button type="submit" class="btn btn-primary" action="">Modifier un service</button> <br><br>
                <a href="/frontad" class="btn btn-danger">Revenir à la liste ds services</a>
            </form>


        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
