<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/admin/createPatient.css') }}">
    <title>Document</title>
</head>
<body>

<header>
    <div class="titre un"></div>
    <div class="titre deux">
        <h2>Enregistrement Praticien *******<span>1</span></h2>
    </div>
    <div class="divanim"></div>
</header>

<main>
    <div class="cadre">
        <div class="registre">
            <form action="{{ route('store.praticien') }}" method="POST">
                @csrf
                <div class="formulaire">
                    <div class="form1">
                        <div class="numero">
                            <label for="#">NIU:</label>
                            <h3></h3>
                        </div>
                        <div class="input">
                            <input type="text" value="{{ session('user_data.name') }}" readonly>
                            <input type="text" placeholder="Saisir votre prénom" name="prenom">
                            <input type="text" placeholder="Saisir votre numéro de téléphone" name="tel">
                            <input type="text" placeholder="Saisir le lieu de naissance" name="lieuNaiss">
                            <input type="text" placeholder="Saisir votre ville" name="ville">
                        </div>
                        <label for="">Genre</label>
                        <div class="select">
                            <select name="genre" id="">
                                <option value="masculin">Masculin</option>
                                <option value="feminin">Féminin</option>
                            </select>
                            <label for="">Mes services</label>
                            <select name="service_id" id="">
                                @foreach ($service as $servi)
                                    <option value="{{ $servi->id }}">{{ $servi->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form2">
                        <div class="input">
                            <input type="text" value="{{ session('user_data.email') }}" readonly>
                            <label for="">Profession</label>
                            <input type="text" name="profession" placeholder="Saisir votre profession">
                            <input type="date" name="dateNaiss">
                            <label for="">Spécialité</label>
                            <input type="text" name="specialite" placeholder="Saisir votre spécialité">
                        </div>
                        <div class="select">
                            <label for="">Pays</label>
                            <select name="pays" id="">
                                <option value="congo">Congo</option>
                                <option value="france">France</option>
                            </select>
                            <label for="">Situation Matrimoniale</label>
                            <select name="sitmatrimoniale" id="">
                                <option value="marié">Marié</option>
                                <option value="divorce">Divorcé</option>
                                <option value="celibataire">Célibataire</option>
                                <option value="veuf">Veuf</option>
                            </select>
                        </div>
                        <div class="textarea">
                            <label for="adresse">Adresse</label>
                            <textarea name="adresse" id="adresse"></textarea>
                        </div>
                    </div>
                </div>
                <div class="formulaire-btn">
                    <button type="reset">Annuler</button>
                    <button type="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
</main>

<footer>
    <p>footer</p>
</footer>

</body>
</html>
