<!DOCTYPE html>
<html>
<head>
    <title>Prendre un rendez-vous</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Prendre un rendez-vous</h1>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <h2>Liste des praticiens</h2>
        <ul>
            @foreach ($praticiens as $praticien)
                <li>
                    <h3>{{ $praticien->prenom }} ({{ $praticien->speciality }})</h3>
                    <form action="{{ route('rendezvous.request', $praticien->id) }}" method="POST">
                        @csrf
                        <label for="appointment_time_{{ $praticien->id }}">Choisir un créneau :</label>
                        <input type="datetime-local" name="appointment_time" id="appointment_time_{{ $praticien->id }}" required>
                        <button type="submit">Programmer un rendez-vous</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
