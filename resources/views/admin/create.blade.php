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
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h2 class="text-center mb-4">Ajouter Praticien</h2>
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('praticiens.storePraticien') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Other form fields -->
    <input type="file" name="image" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
    <input type="date" name="dateNaiss" placeholder="Date de naissance" required>
    <input type="text" name="genre" placeholder="Genre" required>
    <input type="text" name="tel" placeholder="Téléphone" required>
    <input type="text" name="profession" placeholder="Profession" required>
    <input type="text" name="adresse" placeholder="Adresse" required>
    <input type="text" name="mattricule" placeholder="Code postal" required>
    <label for="specialite" class="form-label">Spécialité:</label>
                    <input type="text" name="specialite" id="specialite" class="form-control" required>
    <select name="user_id" required>
    @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</select>
    <select name="service_id" required>
        @foreach($services as $service)
            <option value="{{ $service->id }}">{{ $service->libelle }}</option>
        @endforeach
    </select>
    <button type="submit">Ajouter Praticien</button>
</form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
