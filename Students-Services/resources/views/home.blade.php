@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenue</div>

                <div class="card-body">
                    <h2>Bienvenue sur notre site</h2>
                    <p>Cliquez sur le bouton ci-dessous pour voir votre profil :</p>
                    
                    @auth
                        <a href="{{ route('user.profile') }}" class="btn btn-primary">Voir mon profil</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary">S'inscrire</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection