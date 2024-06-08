
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HGD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>


    <div class="container mt-5">
        <h1>Mes Examens</h1>

        @if($examens->isEmpty())
            <p>Aucun examen trouvé.</p>
        @else
            @foreach($examens as $examen)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $examen->titre }}</h5>
                        <p class="card-text">Description : {{ $examen->description }}</p>
                        <p class="card-text">Numéro : {{ $examen->numero }}</p>
                        <a href="{{ route('examens.show', $examen->id) }}" class="btn btn-primary">Voir Examen</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
  

</body>
</html>
