@extends('layouts.app')

@section('content')
<style>
    /* Responsive Base Styles */
    .landing {
        width: 100%;
    }

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
        background-color: rgba(133, 133, 131, 0.79);
        padding: 2em;
        border-radius: 25px;
        position: absolute;
        top: 33%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        text-align: center;
        width: 90%;
        max-width: 600px;
    }

    .landingText {
        font-size: 16px;
    }

    .input-search {
        box-shadow: inset 4px 4px 1px rgba(0, 0, 0, 1);
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
        padding: 1em;
    }

    .serviceCard {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 1em;
    }

    .card {
        border-radius: 10px;
        padding: 15px;
        width: 250px;
        margin: 10px;
        text-align: center;
    }

    .card img {
        max-width: 100%;
        height: auto;
    }

    .card p {
        text-align: center;
        text-shadow: none;
    }

    .recentPosts h1 {
        text-shadow:
          -1px -1px 0 #FFC107,
           1px -1px 0 #FFC107,
          -1px  1px 0 #FFC107,
           1px  1px 0 #FFC107;
    }

    .carousel-item .card {
        width: 100%;
        max-width: 800px;
        text-shadow: none;
        flex-direction: column;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #FFC107;
        border-radius: 50%;
    }

    .carousel-control-prev, .carousel-control-next {
        width: 5%;
    }

    .imgPosted {
        display: flex;
        align-items: center;
        margin: 10px 0;
    }

    .posted {
        font-size: 1em;
        margin-left: 10px;
        text-align: center;
    }

    /* Media Queries for Responsiveness */
    @media screen and (max-width: 768px) {
        .content {
            padding: 1em;
            width: 95%;
        }

        .landingText {
            font-size: 14px;
        }

        .serviceCard {
            flex-direction: column;
        }

        .card {
            width: 100%;
            max-width: 350px;
        }

        .carousel-item .card {
            flex-direction: column;
        }

        .carousel-item .card > div {
            flex-direction: column !important;
            align-items: center !important;
        }

        .imgPosted {
            flex-direction: column;
            text-align: center;
        }

        .posted {
            margin-left: 0;
            margin-top: 10px;
        }
    }

    @media screen and (max-width: 480px) {
        .content {
            top: 40%;
        }

        .landingText {
            font-size: 12px;
        }

        .carousel-control-prev, .carousel-control-next {
            width: 10%;
        }
    }
</style>

<div>
    <div class="landing">
        <div class="image-container">
            <img src="{{ asset('images/students.webp') }}" alt="Etudiants" class="full-page-image">
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
                <input type="search" class="form-control rounded bg-warning input-search border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />    
            </div>
        </div>
    </div>

    <div class="mainContent text-dark">
        <h1>Nos catégories les plus populaires</h1>
        <div class="serviceCard py-4">
            <div class="card">
                <img src="{{ asset('images/pc.png') }}" class="card-img-top" alt="...">
                <p><b>Prêt de matériel</b>
                    <br>
                    <br>
                    Besoin d'un pc ? D'un livre ? D'une enceinte ? 
                    Tout les matériels à disposition </p>
            </div>
            <div class="card">
                <img src="{{ asset('images/cours.png') }}" class="card-img-top" alt="...">
                <p><b>Cours particulier</b>
                    <br>
                    <br>
                    Des lacunes dans une matière ? Retrouve tout nos experts ici !
                </p>
            </div>
            <div class="card">
                <img src="{{ asset('images/groupe-detude.png') }}" class="card-img-top" alt="...">
                <p><b>Groupe d'étude</b>
                    <br>
                    <br>
                    Pas envie de travailler seul ? Rejoins un groupe d'étude 
                    adapté à ton niveau !
                </p>
            </div>
            <div class="card">
                <img src="{{ asset('images/sortie.png') }}" class="card-img-top" alt="...">
                <p><b>Sorties</b>
                    <br>
                    <br>
                    Besoin d'un moment de détente ? Il y a forcément une 
                    sortie programmée !
                </p>
            </div>
        </div>

        <div class="recentPosts py-5">
            <h1 class="text-center mb-4">Derniers Posts</h1>
            <div class="d-flex justify-content-center align-items-center">
                <div class="carousel slide" data-ride="carousel" id="recentPostsCarousel">
                    <!-- Flèches de navigation -->
                    <a class="carousel-control-prev" href="#recentPostsCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>

                    <!-- Contenu du carrousel -->
                    <div class="carousel-inner">
                        @php
                            $posts = [
                                [
                                    'title' => 'Melody Nelson',
                                    'user' => 'Lujipeka',
                                    'image' => 'images/pc.png',
                                    'profile' => 'images/profile1.jpg',
                                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                                ],
                                [
                                    'title' => 'Nouveau Café',
                                    'user' => 'Jean Dupont',
                                    'image' => 'images/pc.png',
                                    'profile' => 'images/profile2.jpg',
                                    'content' => 'Découvre ce café cosy, idéal pour étudier entre amis.'
                                ],
                                [
                                    'title' => 'Concert Live',
                                    'user' => 'Sarah M.',
                                    'image' => 'images/pc.png',
                                    'profile' => 'images/profile3.jpg',
                                    'content' => 'Un concert exceptionnel ce week-end dans le parc central.'
                                ]
                            ];
                        @endphp
                        
                        @foreach($posts as $key => $post)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="card bg-light shadow rounded p-3 d-flex flex-row" style="align-items: flex-start;">
                                <div class="d-flex flex-column">
                                    <h3 class="mb-3 font-weight-bold text-center">{{ $post['title'] }}</h3>
                                    <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}"
                                         class="img-fluid rounded mx-auto"
                                         style="width: 300px; max-width: 100%; border-radius: 10px;">
                                </div>
                                <div class="ml-4 d-flex flex-column justify-content-start" style="flex: 1;">
                                    <div class="imgPosted d-flex align-items-center mb-3">
                                        <img src="{{ asset($post['profile']) }}" alt="{{ $post['user'] }}"
                                             class="rounded-circle" style="width: 50px; height: 50px;">
                                        <span class="posted">
                                            <strong>Posté par :</strong>
                                            <br>{{ $post['user'] }}
                                        </span>
                                    </div>
                                    <!-- Description -->
                                    <p class="mb-0 text-dark">
                                        {{ $post['content'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        
                    <!-- Flèches de navigation -->
                    <a class="carousel-control-next" href="#recentPostsCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ajout des dépendances Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

@endsection