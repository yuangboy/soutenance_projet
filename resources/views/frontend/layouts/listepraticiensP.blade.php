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
      .carousel-item {
        transition: transform 0.6s ease, opacity 0.6s ease;
      }
      .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: #000;
        padding: 10px;
        border-radius: 50%;
      }
      .card {
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 10px;
      }
      .card-body {
        padding: 20px;
      }
      .card-title {
        font-size: 1.5rem;
        font-weight: bold;
      }
      .card-text {
        font-size: 1rem;
        margin-bottom: 10px;
      }
      .carousel-indicators [data-bs-target] {
        background-color: #000;
      }
      .carousel-indicators [data-bs-target].active {
        background-color: #007bff;
      }
      .carousel-container {
        background-color: #ffc107; /* Couleur jaune */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Ombre légère */
      }
      .carousel-control-prev, .carousel-control-next {
        position: absolute;
        top: 75%;
        transform: translateY(-50%);
      }
    </style>
  </head>

  <body>
    <div class="container text-center mb-5">
        <br>
        <h3>BIENVENUE SUR LES PRATICIENS</h3><br><br>
        <div id="praticienCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($praticiens as $index => $praticien)
                    <button type="button" data-bs-target="#praticienCarousel" data-bs-slide-to="{{ $index }}" class="@if($index == 0) active @endif" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-container">
                <div class="carousel-inner">
                    @foreach ($praticiens as $index => $praticien)
                        <div class="carousel-item @if($index == 0) active @endif">
                            <div class="d-flex justify-content-center">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $praticien->prenom }}</h5>
                                        <p class="card-text"><strong>Spécialité:</strong> {{ $praticien->specialite }}</p>
                                        <p class="card-text"><strong>Profession:</strong> {{ $praticien->profession }}</p>
                                        <p class="card-text"><strong>Genre:</strong> {{ $praticien->genre }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#praticienCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#praticienCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
@endsection
