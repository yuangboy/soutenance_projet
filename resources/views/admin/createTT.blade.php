<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Praticien</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Ajouter Praticien</h2>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('patients.store2') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="praticiens_id">Praticien:</label>
                <select name="praticiens_id" id="praticiens_id" class="form-control" required>
                    <option value="">Sélectionnez un praticien</option>
                    @foreach ($emplt as $emplt)
                        <option value="{{ $emplt->id }}">{{ $emplt->name }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Ajoutez les autres champs du formulaire ici -->
            <input type="text" name="codep" id="codep" class="form-control" required>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="annee">Annee en cours:</label>
                <input type="text" name="annee" id="annee" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="genre">Mois:</label>
                <input type="text" name="mois" id="mois" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tel">Jours:</label>
                <input type="text" name="jours" id="jours" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="profession">Heure début consultation:</label>
                <input type="text" name="heured" id="heured" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="profession">Heure fin consultation:</label>
                <input type="text" name="heuref" id="heuref" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
