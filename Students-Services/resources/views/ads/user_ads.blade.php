@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes annonces</h1>
    
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

    <a href="{{ route('ads.create') }}" class="btn btn-success mb-3">Créer une nouvelle annonce</a>

    @if($ads->isEmpty())
        <p>Vous n'avez encore posté aucune annonce.</p>
    @else
        <ul class="list-group">
            @foreach ($ads as $ad)
                <li class="list-group-item">
                    <h3>{{ $ad->title }}</h3>
                    <p>{{ $ad->description }}</p>
                    <div>
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