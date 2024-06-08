<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HGDd</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="stylesheet" href="">
  <link href="{{asset('assets/img/logoSoutenace.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/frenteprati" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logoSoutenace.png')}}" alt="">
        <span class="d-none d-lg-block"><h5 style="color: #0a405f;">Patient</h5></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <!-- End Notification Icon -->

          <!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
    <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/d.JPEG')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><div>{{ Auth::user()->name }}</div></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6> <div>{{ Auth::user()->name }}</div></h6>
              <span>Information du Profil</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
               <li>
                    <a class="dropdown-item d-flex align-items-center" href="/profile">
                        <i class="bi bi-person"></i>
                        <span>Mon Profile</span>
                    </a>
                </li>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a  href="#">

                <span><form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();" class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-box-arrow-right"></i>
                                {{ __('Se déconnecter') }}
                            </x-dropdown-link>
                        </form></span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
</header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('patient.sidebar.sidebar')
 <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 style="text-align: center">Rechercher un service</h1>
    <a href="/patient">rendez-vous</a>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             <br><br><br>

              <!-- Search Form -->
              <div>
                <form class="search-form d-flex align-items-center" method="GET" action="{{route('patient.rdvProgramme')}}">
                    <div class="btn-recherche">
                        <input class="rechercher" type="text" id="inputSaisie" name="search" placeholder="Search" title="Enter search keyword">
                        <button type="submit" title="Search" class="btn-search"><i class="bi bi-search"></i></button>
                    </div>

                    <style>
                        .btn-recherche {
                            display: flex;
                            width: 100%;
                            justify-content: end;
                        }
                        .rechercher, .btn-search {
                            padding: 10px;
                        }
                        .btn-search {
                            background-color: green;
                            margin-left: 2px;
                            border: none;
                        }
                    </style>
                </form>
                <div id="autocompletion"></div>
              </div><!-- End Search Form -->

              @if (!empty($request->search) && isset($searchService))
                <p>{{ $searchService->libelle }}</p>

                @if ($praticiens && $praticiens->isNotEmpty())
                  <!-- Table with stripped rows -->
                  <table class="table">
                    <thead>
                      <tr>

                        <th>Matricule</th>
                        <th>Specialite</th>
                        <th>Service</th>
                        <th>Praticien</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($praticiens as $praticien)
                        <tr class="ligne">
                          <td>{{$praticien->mattricule}}</td>
                          <td>{{$praticien->specialite}}</td>
                          <td>{{$praticien->service->libelle}}</td>
                          <td>{{$praticien->personnes->nom}} {{$praticien->personnes->prenom}}</td>
                          <td class="disponibite">
                            <a href="{{route('afficher.rdv',$praticien->id)}}">Voir la Disponibilté</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table><!-- End Table with stripped rows -->
                @else
                  <div class="text-center">
                    <p>Aucun praticien trouvé pour ce service.</p>
                  </div>
                @endif

              @else

                <!-- Default table when no search is performed -->
                @if ($praticiens && $praticiens->isNotEmpty())
                  <!-- Table with stripped rows -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Prénom</th>
                        <th>Specialite</th>
                        <th>Service</th>
                        <th>Praticien</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($praticiens as $praticien)
                        <tr class="ligne">
                          <td>{{$praticien->prenom}}</td>
                          <td>{{$praticien->specialite}}</td>
                          <td>{{$praticien->service->libelle}}</td>

                          <td class="disponibite">
                            <a href="{{route('afficher.rdv',$praticien->id)}}">Voir la Disponibilté</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table><!-- End Table with stripped rows -->
                @else
                  <div class="vide text-center">
                    <img src="{{ asset('assets/img/vide.svg') }}" alt="Aucune donnée disponible">
                  </div>
                  <style>
                    .vide {
                      max-width: 100px;
                      height: 100px;
                      margin: 0 auto;
                    }
                    .vide img {
                      width: 100%;
                      height: 100%;
                    }
                  </style>
                @endif
              @endif
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Hôpital <strong><span>Général</span></strong>de Djiri
    </div>
    <div class="credits">
       <a href="https://bootstrapmade.com/"></a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        var inputSaisie = document.getElementById("inputSaisie");

        var suggestions = []; // Variable pour stocker les suggestions récupérées du serveur
        var currentIndex = -1; // Index de la suggestion actuellement sélectionnée

        inputSaisie.addEventListener("input", function() {
            var saisie = inputSaisie.value;
            var xhr = new XMLHttpRequest();

            xhr.open("GET", "/rdv?saisie=" + saisie);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Mettre à jour la liste des suggestions avec les données renvoyées par le serveur
                        suggestions = JSON.parse(xhr.responseText);
                        currentIndex = -1; // Réinitialiser l'index de la suggestion sélectionnée
                        afficherSuggestions();
                    } else {
                        console.error("Erreur lors de la récupération des suggestions:", xhr
                        .status);
                    }
                }
            };

            xhr.send();
        });

        // Fonction pour afficher les suggestions dans une liste déroulante
        function afficherSuggestions() {
            var autocompletion = document.getElementById("autocompletion");
            autocompletion.innerHTML = ""; // Effacer les anciennes suggestions

            // Ajouter les nouvelles suggestions à la liste déroulante
            suggestions.forEach(function(suggestion, index) {
                var suggestionItem = document.createElement("div");
                suggestionItem.textContent = suggestion;
                suggestionItem.addEventListener("mousedown", function() {
                    inputSaisie.value =
                    suggestion; // Remplacer le texte du champ de saisie par la suggestion sélectionnée
                    autocompletion.innerHTML =
                    ""; // Cacher la liste déroulante après la sélection

                });
                autocompletion.appendChild(suggestionItem);
            });
        }

        // Gérer la navigation dans les suggestions avec la touche "Tab"
        inputSaisie.addEventListener("keydown", function(event) {
            if (event.key === "Tab") {
                event.preventDefault(); // Empêcher le comportement par défaut de la touche "Tab"

                if (suggestions.length > 0) {
                    currentIndex = (currentIndex + 1) % suggestions
                    .length; // Passer à la suggestion suivante (boucler au début si nécessaire)
                    inputSaisie.value = suggestions[
                    currentIndex]; // Remplacer le texte du champ de saisie par la suggestion sélectionnée
                }
            }


        });

    });
</script>


</body>

</html>
