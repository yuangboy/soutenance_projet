<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Praticien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .container-fluid {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">

        <div class="form-container">
            <br><br>
            <h2 class="text-center mb-4">Ajouter Patient</h2>
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('patients.store2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Form fields for patient data -->
                <input type="file" name="image" placeholder="image" required><br>
                <input type="text" name="prenom" placeholder="Prénom" required><br>
                <input type="date" name="dateNaiss" placeholder="date de naissance" required><br>
                <input type="text" name="genre" placeholder="Genre" required><br>
                <input type="text" name="tel" placeholder="Telephone" required><br>
                <input type="text" name="profession" placeholder="Profession" required>
                <input type="text" name="adresse" placeholder="Adresse" required>
                <input type="text" name="codep" placeholder="Code patient" required>
                <input type="text" name="nationalite" placeholder="Nationalite" required>
                <input type="text" name="ville" placeholder="Ville" required>
                <div class="form-group">
                <input type="text" name="lieuNaiss" placeholder="Lieu de naissance" required>
                </div>
                <input type="text" name="sitmatrimoniale" placeholder="Situation matrimoniale" required>
                <select name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                 <div class="form-group">
            <label for="praticien_id">Praticien</label>
            <select name="praticien_id" id="praticien_id" class="form-control" required>
                @foreach($praticiens as $praticien)
                    <option value="{{ $praticien->id }}">{{ $praticien->prenom }} {{ $praticien->nom }}</option>
                @endforeach
            </select>
        </div>
                <button type="submit">Add Patient</button>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
