@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
                        aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
                        aria-controls="pills-register" aria-selected="false">Register</a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="text" id="loginName" name="name" class="form-control" value="{{ old('name') }}" required />
                            <label class="form-label" for="loginName">Email or username</label>
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" name="password" class="form-control" required />
                            <label class="form-label" for="loginPassword">Password</label>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mb-4">Sign in</button>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="text" id="registerName" name="name" class="form-control" value="{{ old('name') }}" required />
                            <label class="form-label" for="registerName">Name</label>
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-outline mb-4">
                            <input type="email" id="registerEmail" name="email" class="form-control" value="{{ old('email') }}" required />
                            <label class="form-label" for="registerEmail">Email</label>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-outline mb-4">
                            <input type="password" id="registerPassword" name="password" class="form-control" required />
                            <label class="form-label" for="registerPassword">Password</label>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-outline mb-4">
                            <input type="password" id="registerRepeatPassword" name="password_confirmation" class="form-control" required />
                            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mb-3">Sign up</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- Pills content -->
        </div>
    </div>
</div>
@endsection
