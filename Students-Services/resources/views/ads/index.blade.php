<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des annonces</title>
</head>
<body>
    <h1>Liste des annonces</h1>

    <ul>
        @foreach ($ads as $ad)
            <li>
                <strong>{{ $ad->title }}</strong>
                <p>{{ $ad->description }}</p>

                <!-- supp-->
                <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
