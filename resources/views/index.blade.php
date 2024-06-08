@extends('frontend.layouts.front')

@extends('admin.main')
@section('body')

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire avec bordures personnalisées</title>
    <style>

        /* CSS pour définir la couleur des bordures */
        /* Définit la couleur des bordures à rouge */

        /* .form {
            border: 7px solid rgb(0, 79, 104);
            padding: 20px;
           display: flex;
            margin: 0 auto;
            min-width: 80%;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
            display: flex;
}

 .form-title {
    flex: 1;
 } */


 .form{

    display: flex;
    align-items: center;
    justify-content: center;
    border: 7px solid rgb(0, 79, 104);
    width: 100%;
    text-align: center;

 }
  .form-title{

  }
input[type="text"], textarea {
        border: 1px solid black; /* Définit la couleur des bordures des champs de texte à noir */
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: blue; /* Définit la couleur de fond du bouton de soumission */
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Pour mettre en forme les étiquettes des champs */
        label {
            display: block;
            font-weight: bold;
        }
    </style>
</head>
    <br><br>
    <div class="container">
		<div class="row">
                    <div class="form">
                       <h1 class="form-title">Bienvenue sur le dashboard admin</h1>
                    </div>
                    <br>
                    {{-- <img src="{{asset('frontend/assets/img/section-img.png')}}" alt="#"> --}}
				</div>

			</div>
            <br>

    <header class="header" >
        <div class="topbar"  >
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-5 col-12">
							<!-- Contact -->
							<ul class="top-link">
								<li><a href="#">Gerer les Utilisateurs</a></li>
								<li><a href="#">Gerer les Praticiens</a></li>
                                <li><a href="#">Gerer les Patients</a></li>
								<li><a href="#">Gerer les Services</a></li>
								<li><a href="#">Autres activités</a></li>
							</ul>
							<!-- End Contact -->
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">

							</ul>
							<!-- End Top Contact -->
						</div>
					</div>
				</div>
		</div>
        <br><br>

    </header>
   <nav>
        <ul>
            <li><a href="{{ route('listeservice') }}" >Accueil</a></li>
            <li><a href="{{ route('a_propos') }}">À propos</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>
    <div class="contenu">
        @yield('contenu')
    </div>

</html>

@endsection
