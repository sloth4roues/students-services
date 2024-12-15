@extends('layouts.app')

@section('content')
<style>
    .profileContent {
        margin-top: 13em;
    }
</style>
<section class="profileContent justify-content-center align-items-center w-100 px-4 py-5" style="border-radius: .5rem .5rem 0 0; min-height: 50vh;">
    <div class="row d-flex justify-content-center">
        <div class="col col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
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
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-grow-1">Follow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
