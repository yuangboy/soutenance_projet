<x-mail::message>
# Introduction

<br>
Heure d'ouverture {{$debut}}
Heure de fermeture {{$fin}}

Pour en savoir plus, rendez-vous sur notre application web.

<x-mail::button :url="'http://localhost:8000/frenteprati/horaires'">
Voir
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
