<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Examens</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .prescription-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .prescription-header img {
            height: 80px;
        }
        .prescription-header .country-name {
            text-align: right;
        }
        .prescription-card {
            border: 2px solid #000;
            margin-bottom: 20px;
            padding: 20px;
        }
        .prescription-card .card-title {
            font-weight: bold;
        }
        .prescription-card .card-text {
            margin-bottom: 10px;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        @if($examens->isEmpty())
            <p class="text-center">Aucun examen trouvé.</p>
        @else
            @foreach($examens as $examen)

                <div class="prescription-card card mb-3" id="examen-{{ $examen->id }}">
                    <div class="card-body">
                        <div class="prescription-header">
            <img src="{{ asset('assets/img/logoSoutenace.png')}}" alt="Logo">
            <h2>l'Hôpital Général de Djiri</h2>
            <div class="country-name">
                <h2>République du Congo</h2>

                <p>Unité * Travail * Progrès</p>
            </div>
        </div>
        <h1 class="text-center mb-5">Examens</h1>

                        <p class="card-text"><strong>Type Examen :</strong> {{ $examen->titre }}</h5></p><br>
                        <p class="card-text"><strong>Description :</strong> {{ $examen->description }}</p><br>
                        <p class="card-text"><strong>Numéro :</strong> {{ $examen->numero }}</p>
                        <button onclick="printExamen('examen-{{ $examen->id }}')" class="btn btn-secondary print-button">Imprimer</button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <script>
        function printExamen(examenId) {
            const examen = document.getElementById(examenId);
            const originalContent = document.body.innerHTML;
            const printContent = examen.outerHTML;

            document.body.innerHTML = `
                <div class="container mt-5">
                    ${printContent}
                </div>
            `;

            window.print();
            document.body.innerHTML = originalContent;
            window.location.reload();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
