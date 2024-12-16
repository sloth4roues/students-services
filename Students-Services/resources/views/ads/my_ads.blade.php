<!-- resources/views/ads/my_ads.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container text-dark">
    <h1>Mes Annonces</h1>


    @if ($ads->isEmpty())
        <p>Vous n'avez pas encore créé d'annonces.</p>
    @else
        <ul>
            @foreach ($ads as $ad)
                <li>
                    <h2>{{ $ad->title }}</h2>
                    <p>{{ $ad->description }}</p>
                    <small>Créée le : {{ $ad->creation_date }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
