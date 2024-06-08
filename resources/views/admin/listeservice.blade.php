@extends('frontend.layouts.front')
@section('body')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HGD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>


  <body>
        <div class="container text-center">

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
                    <table class="table ">
                                            <thead>
                                                <tr class="table-light">
                                                    <th>Nom </th>
                                                    <th>Description</th>
                                                    <th>Praticien</th>
                                                </tr>
                                            </thead>
                            @foreach($service as $services)
                                            <div class="container">
                                            <tbody>
                                                <tr>
                                                    <td><h5>{{ $services->libelle }}</h5></td>
                                                    <td><h5>{{ $services->description }}</h5></td>
                                                    <td><a href="{{ route('admin.services.praticiens', $services->id) }}" class="btn btn-primary">Voir Praticiens</a></td>
                                            </tbody>
                                            </div>
                            @endforeach
                        </table>
                        <div id="praticien-modal" style="display: none;">
    <div id="praticien-list"></div>
    <button id="close-modal">Fermer</button>
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
    });
</script>

        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
@endsection

