@extends('frontend.layouts.front')
@section('body')
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HGD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }
    .modal-content {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 600px;
    }
    .close-modal {
        float: right;
        cursor: pointer;
        color: #aaa;
    }
    .voir-praticien {
        background-color: #ffc107; /* Couleur jaune */
        border-color: #ffc107; /* Couleur de bordure */
    }
    .voir-praticien:hover {
        background-color: #e0a800; /* Couleur jaune foncé au survol */
        border-color: #e0a800; /* Couleur de bordure au survol */
    }
  </style>
</head>
<body>
<div class="container text-center mt-5">
  @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

  @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li class="alert alert-danger">
          {{ $error }}
        </li>
      @endforeach
    </ul>
  @endif

  <h1 class="mb-5">Liste des Services Médicaux de l'Hôpital Général de Djiri</h1>

  <table class="table table-striped">
    <thead class="table-light">
    <tr>
      <th>Nom</th>
      <th>Description</th>
      <th>Praticien</th>
    </tr>
    </thead>
    <tbody>
    @foreach($service as $services)
      <tr>
        <td>{{ $services->libelle }}</td>
        <td>{{ $services->description }}</td>
        <td><button class="btn btn-primary voir-praticien" data-id="{{ $services->id }}">Voir Praticiens</button></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

<div id="praticien-modal" class="modal">
  <div class="modal-content">
    <span id="close-modal" class="close-modal">&times;</span>
    <div id="praticien-list"></div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.voir-praticien').on('click', function() {
      var serviceId = $(this).data('id');
      $.ajax({
        url: '/services/' + serviceId + '/praticiens',
        method: 'GET',
        success: function(data) {
          var praticienList = $('#praticien-list');
          praticienList.empty();
          data.forEach(function(praticien) {
            praticienList.append('<p>' + praticien.prenom + '</p>');
          });
          $('#praticien-modal').show();
        }
      });
    });

    $('#close-modal').on('click', function() {
      $('#praticien-modal').hide();
    });

    $(window).on('click', function(event) {
      if ($(event.target).is('#praticien-modal')) {
        $('#praticien-modal').hide();
      }
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
@endsection
