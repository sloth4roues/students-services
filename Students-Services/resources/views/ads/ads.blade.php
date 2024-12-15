@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts récents :</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Date d'inscription: {{ $user->created_at->format('d/m/Y') }}</p>
            <p class="card-text">Points: {{ $user->points }}</p>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Modifier mon profil</a>
            
            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre profil ?')">Supprimer le profil</button>
            </form>
        </div>
    </div>
</div>
@endsection