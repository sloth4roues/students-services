<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'annonce</title>
</head>
<body>
    <h1>Modifier l'annonce</h1>

    <!-- Affichage des messages de succès ou erreur -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Formulaire de modification -->
    <form action="{{ route('ads.update', $ad->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Utilisation de PUT pour indiquer la mise à jour -->

        <div>
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" value="{{ old('title', $ad->title) }}" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required>{{ old('description', $ad->description) }}</textarea>
        </div>

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="{{ route('ads.index') }}">Retour à la liste des annonces</a>
</body>
</html>
