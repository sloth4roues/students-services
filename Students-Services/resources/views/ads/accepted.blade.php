@extends('layouts.app')

@section('content')
<style>
    .mainContent{
        color: black;
    }

    .ad-item p {
        font-size: 1.1em;
        color: black; /* Change la couleur du texte à noir */
    }
</style>

<div class="mainContent">
    <h1>Mes annonces acceptées</h1>

    @if($ads->isEmpty())
        <p>Aucune annonce acceptée.</p>
    @else
        <ul class="ads-list">
            @foreach ($ads as $ad)
                <li class="ad-item">
                    <h3>{{ $ad->title }}</h3>
                    <p>{{ $ad->description }}</p>
                    <div class="ad-actions">
                        <p>Vous avez posté cette annonce.</p>

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
