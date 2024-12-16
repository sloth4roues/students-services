@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mes annonces</h1>

        @if($ads->isEmpty())
            <p>Vous n'avez aucune annonce.</p>
        @else
            <ul class="list-group">
                @foreach ($ads as $ad)
                    <li class="list-group-item">
                        <h3>{{ $ad->title }}</h3>
                        <p>{{ $ad->description }}</p>
                        <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-info">Voir l'annonce</a>
                        <a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
