@extends('layouts.app')

@section('content')
<style>
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded">
                <div class="card-body">
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
                        </div> <!-- End of register tab -->
                    </div> <!-- End of tab content -->
                </div> <!-- End of card body -->
            </div> <!-- End of card -->
        </div> <!-- End of column -->
    </div> <!-- End of row -->
</div> <!-- End of container -->
@endsection
