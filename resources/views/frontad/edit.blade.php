<!DOCTYPE html>
<html>
<head>
    <title>Modifier Praticien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier Praticien</h2>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('praticiens.update1', $praticiens->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="user_id">Utilisateur:</label>
                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $praticiens->user_id }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="service_id">Service:</label>
                <input type="text" name="service_id" id="service_id" class="form-control" value="{{ $praticiens->service_id }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control">
                <img src="{{ $praticiens->image }}" alt="Image" width="100" class="mt-2">
            </div>
            <div class="form-group mb-3">
                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $praticiens->prenom }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="dateNaiss">Date de Naissance:</label>
                <input type="date" name="dateNaiss" id="dateNaiss" class="form-control" value="{{ $praticiens->dateNaiss }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" class="form-control" value="{{ $praticiens->genre }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="tel">Téléphone:</label>
                <input type="text" name="tel" id="tel" class="form-control" value="{{ $praticiens->tel }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="profession">Profession:</label>
                <input type="text" name="profession" id="profession" class="form-control" value="{{ $praticiens->profession }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="adresse">Adresse:</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $praticiens->adresse }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="mattricule">Matricule:</label>
                <input type="text" name="mattricule" id="mattricule" class="form-control" value="{{ $praticiens->mattricule }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="specialite">Spécialité:</label>
                <input type="text" name="specialite" id="specialite" class="form-control" value="{{ $praticiens->specialite }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="/user" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>
