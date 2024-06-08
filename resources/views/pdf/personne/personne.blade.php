<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Personne</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Informations de la Personne</h1>
    <table>
        <tr>
            <th>Nom</th>
            <td>{{ $personne->nom }}</td>
        </tr>
        <tr>
            <th>Prénom</th>
            <td>{{ $personne->prenom }}</td>
        </tr>
        <tr>
            <th>Date de Naissance</th>
            <td>{{ $personne->dateNaiss }}</td>
        </tr>
        <tr>
            <th>Genre</th>
            <td>{{ $personne->genre }}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $personne->tel }}</td>
        </tr>
        <tr>
            <th>Profession</th>
            <td>{{ $personne->profession }}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{ $personne->adresse }}</td>
        </tr>
        {{-- <tr>
            <th>Situation Matrimoniale</th>
            <td>{{ $personne->sitmatrimoniale }}</td>
        </tr> --}}
        <tr>
            <th>Email</th>
            <td>{{ $personne->email }}</td>
        </tr>
        <tr>
            <th>Nationalité</th>
            <td>{{ $personne->nationalite }}</td>
        </tr>
        <tr>
            <th>Ville</th>
            <td>{{ $personne->lieuNaiss}}</td>
        </tr>
        <tr>
            <td>{!! DNS2D::getBarcodeHTML(
                $personne,
            'QRCODE') !!}</td>
        </tr>
    </table>
</body>
</html>
