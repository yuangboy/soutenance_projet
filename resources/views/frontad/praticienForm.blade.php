

@section('content')
<div class="container">

    <form action="{{ route('admin.users.savePraticienDetails') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="specialty">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="experience">Prénom:</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="specialty">Date de naissance:</label>
            <input type="text" name="dateNaisse" id="dateNaisse" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="experience">Genre:</label>
            <input type="text" name="genre" id="genre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="specialty">telephone:</label>
            <input type="text" name="tel" id="tel" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="experience">Proféssion:</label>
            <input type="text" name="profession" id="profession" class="form-control" required>
        </div>
         <div class="form-group">
            <label for="specialty">Adresse:</label>
            <input type="text" name="adresse" id="adresse" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="experience">Matricule:</label>
            <input type="text" name="matricule" id="matricule" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="experience">Service:</label>
            <input type="text" name="service_id" id="service_id" class="form-control" required>
        </div>
        <!-- Ajoutez d'autres champs nécessaires -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

