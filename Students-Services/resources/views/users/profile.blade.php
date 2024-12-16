@extends('layouts.app')

@section('content')
<!-- Ajout des dépendances -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

<style>
    /* Responsive Base Styles */
    body {
        overflow-x: hidden;
    }

    #particles-js {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: #282c34;
    }

    .profileContent {
        position: relative;
        margin-top: 3em;
        padding: 1em;
        min-height: 50vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h1 {
        font-family: 'Roboto', sans-serif;
        text-align: center;
        margin-bottom: 1.5em;
        color: black;
        text-shadow:
          -1px -1px 0 #FFC107,
           1px -1px 0 #FFC107,
          -1px  1px 0 #FFC107,
           1px  1px 0 #FFC107;
        font-size: 2rem;
    }

    .profile-card {
        width: 100%;
        max-width: 600px;
        border-radius: 15px;
    }

    .profile-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .profile-stats {
        display: flex;
        justify-content: space-around;
        width: 100%;
        margin-top: 1em;
        background-color: #f8f9fa;
        padding: 0.5em;
        border-radius: 10px;
    }

    .profile-actions {
        display: flex;
        flex-direction: column;
        gap: 0.5em;
        width: 100%;
    }

    .btn-profile {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.75em;
        width: 100%;
    }

    /* Media Queries for Responsiveness */
    @media screen and (max-width: 768px) {
        .profileContent {
            margin-top: 2em;
            padding: 0.5em;
        }

        h1 {
            font-size: 1.5rem;
            margin-bottom: 1em;
        }

        .profile-stats {
            flex-direction: column;
            text-align: center;
            gap: 0.5em;
            padding: 1em;
        }

        .profile-stats > div {
            margin-bottom: 0.5em;
        }

        .profile-actions {
            flex-direction: column;
        }

        .btn-profile {
            margin-bottom: 0.5em;
        }
    }

    @media screen and (max-width: 480px) {
        h1 {
            font-size: 1.2rem;
        }

        .card-body {
            padding: 1em !important;
        }

        .profile-header h5 {
            font-size: 1rem;
        }

        .profile-header p {
            font-size: 0.9rem;
        }
    }
</style>

<section class="profileContent w-100">
    <!-- Conteneur pour les particules -->
    <div id="particles-js"></div>
    
    <div class="container">
        <h1>Mon profil</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card animate__animated animate__fadeIn profile-card">
                    <div class="card-body p-4">
                        <div class="profile-header">
                            <h5 class="card-title mb-3">{{ $user->name }}</h5>
                            <p class="card-text">Email: {{ $user->email }}</p>
                            <p class="card-text">Date d'inscription: {{ $user->created_at->format('d/m/Y') }}</p>
                            <p class="card-text">Points: {{ $user->points }}</p>
                        </div>

                        <div class="profile-stats my-3">
                            <div>
                                <p class="small text-muted mb-1">Articles</p>
                                <p class="mb-0">41</p>
                            </div>
                            <div>
                                <p class="small text-muted mb-1">Followers</p>
                                <p class="mb-0">976</p>
                            </div>
                            <div>
                                <p class="small text-muted mb-1">Rating</p>
                                <p class="mb-0">8.5</p>
                            </div>
                        </div>

                        <div class="profile-actions">
                            <a href="{{ route('user.edit', $user->id) }}"
                               class="btn btn-outline-warning text-dark btn-profile">
                                <i class="bi bi-pencil-square me-2"></i>
                                Modifier mon profil
                            </a>
                            
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-profile"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre profil ?')">
                                        Supprimer le profil
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Configuration Particles.js -->
<script>
    particlesJS('particles-js', {
        particles: {
            number: { value: 80, density: { enable: true, value_area: 800 } },
            color: { value: "#FFC107" },
            shape: {
                type: "circle",
                stroke: { width: 0, color: "#000000" },
                polygon: { nb_sides: 5 }
            },
            opacity: { value: 0.5, random: false },
            size: { value: 3, random: true },
            line_linked: {
                enable: true,
                distance: 150,
                color: "#ffffff",
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 2,
                direction: "none",
                out_mode: "out"
            }
        },
        interactivity: {
            events: {
                onhover: { enable: true, mode: "grab" },
                onclick: { enable: true, mode: "push" }
            },
            modes: {
                grab: { distance: 140 },
                push: { particles_nb: 4 }
            }
        },
        retina_detect: true
    });
</script>
@endsection