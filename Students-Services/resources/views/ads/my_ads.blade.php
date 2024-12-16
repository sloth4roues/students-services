@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Mes Annonces</h1>

    <!-- Bouton pour revenir à la liste complète -->
    <div class="text-center mb-4">
        <a href="{{ route('ads.index') }}" class="btn btn-primary">Retour à toutes les annonces</a>
    </div>

    <!-- Vérifie s'il y a des annonces -->
    @if($ads->isEmpty())
        <p class="text-center">Vous n'avez publié aucune annonce pour le moment.</p>
    @else
        <ul class="list-group">
            @foreach ($ads as $ad)
                <li class="list-group-item mb-3">
                    <h3>{{ $ad->title }}</h3>
                    <p>{{ $ad->description }}</p>
                    <div class="ad-actions">
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
