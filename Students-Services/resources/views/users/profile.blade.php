@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mon Profil</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Date d'inscription: {{ $user->created_at->format('d/m/Y') }}</p>
            <p class="card-text">Points: {{ $user->points }}</p>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Modifier mon profil</a>
            <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-primary">Supprimer le profil</a>
        </div>
    </div>
</div>
@endsection