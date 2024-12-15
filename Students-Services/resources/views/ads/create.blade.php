<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une annonce</title>
</head>
<body>
    <h1>Créer une nouvelle annonce</h1>

    <form action="{{ route('ads.store') }}" method="POST">
        @csrf
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        @error('title') <div>{{ $message }}</div> @enderror

        <label for="description">Description :</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        @error('description') <div>{{ $message }}</div> @enderror

        <button type="submit">Créer l'annonce</button>
    </form>
</body>
</html>
