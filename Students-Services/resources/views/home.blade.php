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
        height: auto;
        min-height: 100%;
        object-fit: cover;
        transform: translate(-50%, -60%);
        filter: blur(5px);
    }

    .content {
        background-color: #858583;
        padding: 100px 200px;
        border-radius: 25px;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        text-align: center;
    }
</style>

<div class="landing">
    <div class="image-container">
        <img src="{{ asset('images/students.webp') }}" alt="Image d'accueil" class="full-page-image">
    </div>
    <div class="content">
        <h2>Bienvenue chez <b>StudEase</b> !</h2>
        <p></p>
    </div>
</div>
@endsection
