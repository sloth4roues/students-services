<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des annonces</title>
</head>
<body>
    <h1>Liste des annonces</h1>

    <!-- Formulaire de recherche -->
    <form method="GET" action="{{ route('ads.index') }}">
        <input type="text" name="search" placeholder="Rechercher une annonce..." value="{{ request()->input('search') }}">
        <button type="submit">Rechercher</button>
    </form>

    <!-- Affichage du message si aucune annonce n'est trouvée -->
    @if($ads->isEmpty())
        <p>Aucune annonce ne correspond à votre recherche pour "<strong>{{ $searchTerm }}</strong>".</p>
        @if(!empty($searchTerm))
            <p>Essayez des résultats similaires :</p>
            <!-- Affichage des annonces similaires (si recherche partielle est faite) -->
            @foreach ($ads as $ad)
                <div>
                    <strong>{{ $ad->title }}</strong>
                    <p>{{ $ad->description }}</p>
                    <a href="{{ route('ads.edit', $ad->id) }}">Modifier</a>
                    <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </div>
            @endforeach
        @endif
    @else
        <!-- Affichage des annonces qui correspondent exactement à la recherche -->
        <ul>
            @foreach ($ads as $ad)
                <li>
                    <strong>{{ $ad->title }}</strong>
                    <p>{{ $ad->description }}</p>

                    <!-- Lien vers la page de modification -->
                    <a href="{{ route('ads.edit', $ad->id) }}">Modifier</a>

                    <!-- Formulaire de suppression -->
                    <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
