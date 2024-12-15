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
        background-color:rgba(133, 133, 131, 0.79);
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
        box-shadow: inset 4px 4px 1px rgba(0, 0, 0, 1); /* Ombre intérieure */
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

    .serviceCard {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10em;
    }

    .card p {
        text-align: center;
        text-shadow: none;
    }
</style>

<div>
    <div class="landing">
        <div class="image-container">
            <img src="{{ asset('images/students.webp') }}" alt="Image d'accueil" class="full-page-image">
        </div>
        <div class="content">
            <h2>Bienvenue chez <b>StudEase</b> !</h2>
            <p class="landingText">Vous pouvez retrouver ici tout les services dont vous avez besoin. 
                Vous pouvez en proposer afin de <b>gagner des points</b>, ou en demander 
                ce qui <b>vous coûtera des points</b>.
            </p>
            <div class="input-group rounded py-4">
                <span class="input-group-text" id="search-addon" style="background: transparent; border: none;">
                    <img src="{{ asset('images/loupe.png') }}" alt="Loupe" style="width: 30px; height: 30px;">
                </span>
                <input type="search" class="form-control rounded bg-warning input-search border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />    </div>
            </div>
        </div>
    </div>

    <div class="mainContent text-dark">
        <h1>Nos catégories les plus populaires</h1>
        <div class="serviceCard py-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/pc.png') }}" class="card-img-top" alt="...">
                <p>Test</p>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/cours.png') }}" class="card-img-top" alt="...">
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/groupe-detude.png') }}" class="card-img-top" alt="...">
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/sortie.png') }}" class="card-img-top" alt="...">
            </div>
        </div>
    </div>
</div>
@endsection
