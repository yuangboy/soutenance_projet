// resources/views/examen/examen_create.blade.php

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Prescrire un Examen</h1>

    <form method="POST" action="{{ route('examens.store') }}">
        @csrf
        <input type="hidden" name="patient_id" value="{{ $patient->id }}">

        <div class="mb-3">
            <label for="praticien" class="form-label">Praticien</label>
            <input type="text" class="form-control" id="praticien" value="{{ Auth::user()->name }}" disabled>
        </div>

        <div class="mb-3">
            <label for="patient" class="form-label">Patient</label>
            <input type="text" class="form-control" id="patient" value="{{ $patient->prenom }}" disabled>
        </div>

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Numéro</label>
            <input type="text" class="form-control" id="numero" name="numero" required>
        </div>

        <button type="submit" class="btn btn-primary">Partager</button>
    </form>
</div>
@endsection
