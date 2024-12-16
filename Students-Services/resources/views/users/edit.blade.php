@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

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
        z-index: 1;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto; 
    }

    h1 {
        margin-top: 2em;
        text-align: center;
        margin-bottom: 1em;
        color: black;
        text-shadow: 
          -1px -1px 0 #FFC107,  
           1px -1px 0 #FFC107,
          -1px  1px 0 #FFC107,
           1px  1px 0 #FFC107;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        border-radius: 5px;
        box-shadow: none;
        border: 1px solid #ddd;
    }

    .btn {
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto; 
        width: 100%; 
    }

    .btn-primary {
        background-color: #FFC107;
        border-color: #FFC107;
    }

    .btn-primary:hover {
        background-color: #FFC107;
        border-color: #FFC107;
        box-shadow: inset 0 0 8px rgba(0, 0, 0, 1);
    }
</style>

<div id="particles-js"></div>

<h1 class="text-center">Modifier mon profil</h1>
<div class="container profileContent card animate__animated animate__fadeIn">
    <form method="POST" action="{{ route('user.update', $user-> id) }}">
        @csrf
        @method('PUT')

        <div class="form-group text-dark">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group text-dark">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <button type="submit" class="btn btn-outline-warning text-dark me-2">Mettre à jour</button>
    </form>
</div>

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
