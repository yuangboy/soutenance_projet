<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <input type="text" id="inputSaisie" placeholder="Entrez votre saisie">
    <div id="autocompletion"></div>

    <h1>Liste des Formations</h1>

    <ul>
        @foreach ($services as $service)
            <li>{{ $service->libelle }}</li>
        @endforeach
    </ul>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var inputSaisie = document.getElementById("inputSaisie");

            var suggestions = []; // Variable pour stocker les suggestions récupérées du serveur
            var currentIndex = -1; // Index de la suggestion actuellement sélectionnée

            inputSaisie.addEventListener("input", function() {
                var saisie = inputSaisie.value;
                var xhr = new XMLHttpRequest();

                xhr.open("GET", "/autocomplete?saisie=" + saisie);

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
