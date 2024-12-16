@extends('layouts.app')

@section('content')
<style>
    .image-container {
        position: relative;
        height: 60vh;
        overflow: hidden;
    }

    .full-page-image {
        position: absolute;
        top: 50%;
        left: 50%; 
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: translate(-50%, -60%);
        filter: blur(5px);
    }

    .content {
        background-color: rgba(133, 133, 131, 0.79);
        padding: 4em 8em;
        border-radius: 25px;
        position: absolute;
        top: 33%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        text-align: center;
    }

    .landingText {
        font-size: 17px;
    }

    .input-search {
        box-shadow: inset 4px 4px 1px rgba(0, 0, 0, 1); 
        width:  600px;       
    }

    .mainContent {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: white;
        text-shadow: 
          -1px -1px 0 #FFC107,  
           1px -1px 0 #FFC107,
          -1px  1px 0 #FFC107,
           1px  1px 0 #FFC107;
    }

    .ads-list {
        margin-top: 2em;
        list-style-type: none;
        padding: 0;
        margin-left: 10px;
    }

    .ad-item {
        background-color: rgba(0, 0, 0, 0.6); /* Darker background for better contrast */
        border-radius: 15px;
        padding: 2em;
        margin-bottom: 2em;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .ad-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.5);
    }

    .ad-item h3 {
        font-size: 1.8em;
        color: #FFC107;
    }

    .ad-item p {
        font-size: 1.1em;
        color: white;
    }

    .ad-actions a {
        color: rgb(0, 0, 0);
        text-decoration: none;
        margin-right: 1em;
    }

    .ad-actions button {
        background-color: #FF5722;
        color: white;
        border: none;
        padding: 5px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-weight: bold;
    }

    .ad-actions button:hover {
        background-color: #FF3D00;
    }

    .search-form select,
    .search-form input {
        margin-right: 1em;
    }

    /* Style pour la barre de recherche */
    .input-search {
        border-radius: 50px;
        padding: 10px;
        border: 2px solid #FFC107;
    }

    .input-group-text {
        background: transparent;
        border: none;
    }
</style>

<div class="landing">
    <div class="image-container">
        <img src="{{ asset('images/students.webp') }}" alt="Image d'accueil" class="full-page-image">
    </div>
    <div class="content">
        <h2>Bienvenue sur la liste des annonces !</h2>
        <p class="landingText">
            Retrouvez toutes les annonces disponibles ici. Vous pouvez créer, modifier ou supprimer des annonces selon vos besoins.
        </p>

        <!-- Affichage des alertes -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="input-group rounded py-4">
            <span class="input-group-text" id="search-addon" style="background: transparent; border: none;">
                <img src="{{ asset('images/loupe.png') }}" alt="Loupe" style="width: 30px; height: 30px;">
            </span>
            <form action="{{ route('ads.index') }}" method="GET" class="d-flex">
                <input type="search" name="search" class="form-control rounded bg-warning input-search border-0" placeholder="Rechercher" aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" style="display:none;">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="mainContent text-dark">
    <h1>Liste des annonces</h1>

    <!-- Formulaire de recherche avec sélection du tri -->
    <form method="GET" action="{{ route('ads.index') }}" class="search-form d-flex align-items-center mb-4">
        <input type="text" name="search" placeholder="Rechercher une annonce..." class="form-control w-50" value="{{ request()->input('search') }}">

        <select name="sort" class="form-control w-25" onchange="this.form.submit()">
            <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Plus récent</option>
            <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Plus ancien</option>
        </select>

        <button type="submit" class="btn btn-warning">Rechercher</button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('ads.create') }}" class="btn btn-success">Créer une annonce</a>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('ads.myAds') }}" class="btn btn-primary">Voir mes annonces créées</a>
    </div>

    
    <!-- Lien vers les annonces acceptées -->
    <div class="text-center mt-4">
        <a href="{{ route('ads.showAcceptedAds') }}">Voir les annonces acceptées</a>
    </div>

    <!-- Liste des annonces -->
    @if($ads->isEmpty())
        <p>Aucune annonce trouvée pour "<strong>{{ $searchTerm }}</strong>".</p>
    @else
        <ul class="ads-list">
            @foreach ($ads as $ad)
                <li class="ad-item">
                    <h3>{{ $ad->title }}</h3>
                    <p>{{ $ad->description }}</p>
                    <div class="ad-actions">
                        <!-- Si l'utilisateur connecté n'est pas celui qui a posté l'annonce -->
                        @if (auth()->user()->id !== $ad->user_id)
                            <form action="{{ route('ads.accept', $ad->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Accepter l'annonce</button>
                            </form>
                        @else
                            <!-- Si l'utilisateur est celui qui a posté l'annonce, pas de bouton "Accepter" -->
                            <p>Vous avez posté cette annonce.</p>
                        @endif

                        <!-- Boutons Modifier et Supprimer -->
                        <a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>

@endsection
