@extends('layouts.app')

@section('content')
<div class="container">
     <h1 class="text-center fw-bold">{{ __('Login') }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-3">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mt-3 mx-2">

                            <!-- Usernameに変える -->
                            <div class="col-4 input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 mx-2" >
                            <div class="col input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 mx-2">
                            <div class="col">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>

                                <!-- Registrationに繋がるようにする -->
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="#">
                                        {{ __('Create Your Account') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
