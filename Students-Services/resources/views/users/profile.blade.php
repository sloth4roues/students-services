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
        margin-top: 12em;
    }
</style>

<section class="profileContent justify-content-center align-items-center w-100 px-4 py-5" 
         style="border-radius: .5rem .5rem 0 0; min-height: 50vh;">
    <!-- Conteneur pour les particules -->
    <div id="particles-js"></div>

    <div class="row d-flex justify-content-center">
        <div class="col col-md-9 col-lg-7 col-xl-6">
            <!-- Ajout de l'animation Animate.css -->
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
                                <button type="button" data-mdb-button-init data-mdb-ripple-init 
                                        class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init 
                                        class="btn btn-primary flex-grow-1">Follow</button>
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
            number: { value: 80, density: { enable: true, value_area: 800 } },
            color: { value: "#FFC107" },
            shape: {
                type: "circle",
                stroke: { width: 0, color: "#858583" },
                polygon: { nb_sides: 5 }
            },
            opacity: {
                value: 0.5,
                random: false,
                anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false }
            },
            size: {
                value: 3,
                random: true,
                anim: { enable: false, speed: 40, size_min: 0.1, sync: false }
            },
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
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false,
                attract: { enable: false, rotateX: 600, rotateY: 1200 }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: { enable: true, mode: "grab" },
                onclick: { enable: true, mode: "push" },
                resize: true
            },
            modes: {
                grab: { distance: 140, line_linked: { opacity: 1 } },
                bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 },
                repulse: { distance: 200, duration: 0.4 },
                push: { particles_nb: 4 },
                remove: { particles_nb: 2 }
            }
        },
        retina_detect: true
    });
</script>
@endsection
