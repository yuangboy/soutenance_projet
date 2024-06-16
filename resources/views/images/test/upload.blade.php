<!DOCTYPE html>
<html>
<head>
    <title>Télécharger une image</title>
</head>
<body>
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" accept="image/*">
        <button type="submit">Télécharger</button>
    </form>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if (session('imagePath'))
        <h3>Prévisualisation de l'image :</h3>
        <img src="{{ asset('storage/' . session('imagePath')) }}" alt="Prévisualisation de l'image" style="max-width: 300px;">
        <form action="{{ route('image.confirm') }}" method="POST">
            @csrf
            <input type="hidden" name="imagePath" value="{{ session('imagePath') }}">
            <button type="submit">Confirmer</button>
        </form>
    @endif
</body>
</html>
