@extends('frontend.layouts.front')
@section('body')


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
                <p style="text-align: center">Aucun Service</p>
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

  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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

@endsection
