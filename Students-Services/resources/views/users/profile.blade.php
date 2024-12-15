@extends('layouts.app')

@section('content')
<!-- Ajout des dépendances -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

<style>
    #particles-js {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: #282c34; /* Arrière-plan attractif si les particules ne chargent pas */
    }

    .profileContent {
        position: relative;
        margin-top: 5em;
    }

    h1 {
        font-family: 'Roboto', sans-serif;
        text-align: center;
        margin-bottom: 2em;
        color: black;
        text-shadow: 
          -1px -1px 0 #FFC107,  
           1px -1px 0 #FFC107,
          -1px  1px 0 #FFC107,
           1px  1px 0 #FFC107;
    }
</style>

<section class="profileContent justify-content-center align-items-center w-100 px-4 py-5" 
         style="border-radius: .5rem .5rem 0 0; min-height: 50vh;">
    <!-- Conteneur pour les particules -->
    <div id="particles-js"></div>
    <h1>Mon profil</h1>
    <div class="row d-flex justify-content-center">
        <div class="col col-md-9 col-lg-7 col-xl-6">
            <div class="card animate__animated animate__fadeIn" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-grow-1 ms-3">
                          <h5 class="card-title">{{ $user->name }}</h5>
                          <p class="card-text">Email: {{ $user->email }}</p>
                          <p class="card-text">Date d'inscription: {{ $user->created_at->format('d/m/Y') }}</p>
                          <p class="card-text">Points: {{ $user->points }}</p>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2 bg-body-tertiary">
                                <div>
                                  <p class="small text-muted mb-1">Articles</p>
                                  <p class="mb-0">41</p>
                                </div>
                                <div class="px-3">
                                  <p class="small text-muted mb-1">Followers</p>
                                  <p class="mb-0">976</p>
                                </div>
                                <div>
                                  <p class="small text-muted mb-1">Rating</p>
                                  <p class="mb-0">8.5</p>
                                </div>
                            </div>
                            <div class="d-flex pt-1">
                                <a href="{{ route('user.edit', $user->id) }}" 
                                   class="btn btn-outline-warning text-dark me-2 d-flex justify-content-center align-items-center flex-fill">
                                    <i class="bi bi-pencil-square me-1"></i>
                                    Modifier mon profil
                                </a>
                                
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-flex flex-fill m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger d-flex justify-content-center align-items-center w-100" 
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
    </div>
</section>

<!-- Configuration Particles.js -->
<script>
    particlesJS('particles-js', {
        particles: {
            number: { value: 100, density: { enable: true, value_area: 800 } },
            color: { value: "#FFC107" },
            shape: {
                type: "circle",
                stroke: { width: 0, color: "#000000" },
                polygon: { nb_sides: 5 }
            },
            opacity: { value: 0.5, random: false },
            size: { value: 3, random: true },
            line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.4, width: 1 },
            move: { enable: true, speed: 2, direction: "none", out_mode: "out" }
        },
        interactivity: {
            events: { onhover: { enable: true, mode: "grab" }, onclick: { enable: true, mode: "push" } },
            modes: { grab: { distance: 140 }, push: { particles_nb: 4 } }
        },
        retina_detect: true
    });
</script>
@endsection
