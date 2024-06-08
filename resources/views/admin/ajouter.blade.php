<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION SERVICE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

        <div class="container ">
            <div class="row">
                <h1>AJOUTER UN Service</h1>
                <hr>



                    @if(session ('status'))
                        <div class="alert alert-success">
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


                <form action="/ajouter/traitement" method="post" class="vstack gap-3">
                @csrf
                 <div class="mb-3">
                    <label for="nom">L'identifiant du service</label>
                    <input type="text" class="form-control" id="id" name="id" >
                </div>
                <div class="mb-3">
                    <label for="prenom">Libelle du service</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" >
                </div>

                <div class="mb-3">
                    <label for="nom">Entrez une description du service</label>
                    <input type="text" class="form-control" id="description" name="description" >
                </div>





                <button type="submit" class="btn btn-primary">Ajouter un service</button> <br><br>
                <a href="/frontad" class="btn btn-danger">Revenir au dashboard</a>
            </form>


        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
