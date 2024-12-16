@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Annonces acceptées</h1>

    @if($ads->isEmpty())
        <p>Aucune annonce acceptée pour le moment.</p>
    @else
        <div class="row">
            @foreach($ads as $ad)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <p class="card-text">{{ Str::limit($ad->texte, 100) }}</p>
                            <p class="card-text"><small class="text-muted">Publié le {{ $ad->created_at->format('d/m/Y') }}</small></p>
                            <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-primary">Voir l'annonce</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $ads->links() }}
    @endif
</div>
@endsection
