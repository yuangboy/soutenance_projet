@extends('frontend.layouts.front')
@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon application Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style type="text/css">
    .menu {
    height: 100%; /* Le menu prendra toute la largeur disponible */
    background-color: #0E0E0E;
    padding: 10px;
    width: 15%;
}

.menu ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.menu ul li {
    padding: 8px 0;
}

.menu ul li a {
    display: block;
    text-decoration: none;
    color: #f8f4f4;
}

.menu ul li a:hover {
    color: #f7f0f0;
}


</style>
<body>
    <div class="menu">
        <ul>
            <li><a href="/listeservicep">Liste Services</a></li>
            <li><a href="/listespraticienP">Liste Praticiens</a></li>
            <li><a href="#">Liste Patients</a></li>
            <li><a href="#">Liste utilisateurs</a></li>
            <li><a href="#">Liste Rendez-vous</a></li>
            <!-- Ajoutez d'autres liens pour chaquezzzzz page -->
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
@endsection
