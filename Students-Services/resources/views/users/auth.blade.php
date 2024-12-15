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
        background: #282c34;
    }

    .profileContent {
        position: relative;
    }

    .authCard {
        margin-top: 13em;
    }
    
    /* Style des onglets actifs */
    .nav-pills .nav-link.tab-btn.active {
        background-color: #FFC107 !important;
        color: black !important;
    }

    /* Style des onglets inactifs */
    .nav-pills .nav-link.tab-btn:not(.active) {
        background-color: white !important;
        color: black !important;
    }

    /* Survol des onglets inactifs */
    .nav-pills .nav-link.tab-btn:not(.active):hover {
        background-color: #FFC107 !important;
        box-shadow: inset 4px 4px 6px rgba(0, 0, 0, 0.5);
    }

    /* Style général pour les boutons "Sign in" et "Sign up" */
    .btn-custom {
        background-color: #FFC107;
        color: black;
        border: none;
        transition: all 0.5s ease;
    }

    .btn-custom:hover {
        background-color: #FFC107;
        box-shadow: inset 4px 4px 6px rgba(0, 0, 0, 0.5);
    }
</style>

<!-- Conteneur des particules -->
<div id="particles-js"></div>

<div class="container mt-5 profileContent">
    <div class="authCard row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded">
                <div class=" card-body">
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link tab-btn active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
                                aria-controls="pills-login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link tab-btn" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
                                aria-controls="pills-register" aria-selected="false">Register</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Login Tab -->
                        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                            <form action="{{ route('login.store') }}" method="POST">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="text" id="loginName" name="name" class="form-control" value="{{ old('name') }}" required />
                                    <label class="form-label" for="loginName">Email or username</label>
                                </div>
                                @error('name')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror

                                <div class='form-outline mb-4'>
                                    <input type='password' id='loginPassword' name='password' class='form-control' required />
                                    <label class='form-label' for='loginPassword'>Password</label>
                                </div>
                                @error('password')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror

                                <div class='d-flex justify-content-center'>
                                    <button type='submit' class='btn btn-custom mb-4'>Sign in</button>
                                </div>

                                @if (session('error'))
                                    <div class='alert alert-danger'>{{ session('error') }}</div>
                                @endif
                            </form>
                        </div>

                        <!-- Register Tab -->
                        <div class='tab-pane fade' id='pills-register' role='tabpanel' aria-labelledby='tab-register'>
                            <form action="{{ route('register.store') }}" method='POST'>
                                @csrf
                                <div class='form-outline mb-4'>
                                    <input type='text' id='registerName' name='name' class='form-control' value="{{ old('name') }}" required />
                                    <label class='form-label' for='registerName'>Name</label>
                                </div>
                                @error('name')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror

                                <div class='form-outline mb-4'>
                                    <input type='email' id='registerEmail' name='email' class='form-control' value="{{ old('email') }}" required />
                                    <label class='form-label' for='registerEmail'>Email</label>
                                </div>
                                @error('email')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror

                                <div class='form-outline mb-4'>
                                    <input type='password' id='registerPassword' name='password' class='form-control' required />
                                    <label class='form-label' for='registerPassword'>Password</label>
                                </div>
                                @error('password')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror

                                <div class='form-outline mb-4'>
                                    <input type='password' id='registerRepeatPassword' name='password_confirmation' class='form-control' required />
                                    <label class='form-label' for='registerRepeatPassword'>Repeat password</label>
                                </div>

                                <div class='d-flex justify-content-center'>
                                    <button type='submit' class='btn btn-custom mb-3'>Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
