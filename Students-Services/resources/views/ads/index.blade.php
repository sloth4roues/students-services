<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des annonces</title>
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
</head>
<body>
    <h1>Liste des annonces</h1>

    <!-- Affichage des messages d'erreur ou de succès -->
    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de recherche avec sélection du tri -->
    <form method="GET" action="{{ route('ads.index') }}" id="searchForm">
        <input type="text" name="search" placeholder="Rechercher une annonce..." value="{{ request()->input('search') }}">

        <!-- Sélecteur pour choisir l'ordre de tri -->
        <select name="sort" onchange="this.form.submit()">
            <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Plus récent</option>
            <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Plus ancien</option>
        </select>

        <button type="submit" style="display:none;">Rechercher</button> <!-- Cacher le bouton -->
    </form>

    <!-- Affichage du message si aucune annonce n'est trouvée -->
    @if($ads->isEmpty())
        <p>Aucune annonce ne correspond à votre recherche pour "<strong>{{ $searchTerm }}</strong>".</p>
        @if(!empty($searchTerm))
            <p>Essayez des résultats similaires :</p>
            <!-- Affichage des annonces similaires -->
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
        <!-- Affichage des annonces -->
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
