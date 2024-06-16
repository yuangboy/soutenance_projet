<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h2>Mes Rendez-vous</h2>
    <div>
        @foreach($rendezvous as $rdv)
        <div>
            <a href="{{ route('rendezvousses.show', $rdv->id) }}">
                Rendez-vous avec {{ $rdv->praticien_id == Auth::id() ? $rdv->patient->name : $rdv->praticien->name }}
            </a>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>
