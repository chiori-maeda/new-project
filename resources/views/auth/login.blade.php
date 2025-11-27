@extends('layouts.app')

@section('content')
<style>
 body {
  margin: 0;
  padding: 0;
  background-color: #333; 
  font-family: 'Segoe UI', sans-serif;
  color: #333;
}
.card {
  background-color: rgba(255, 255, 255, 0.85);
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  backdrop-filter: blur(5px);
}

.snowflake {
  position: fixed;
  top: -10px;
  z-index: 9999;
  color: white;
  font-size: 1.2em;
  user-select: none;
  pointer-events: none;
  animation: fall linear infinite;
}

@keyframes fall {
  0% {
    transform: translateY(0) rotate(0deg);
    opacity: 1;
  }
  100% {
    transform: translateY(100vh) rotate(360deg);
    opacity: 0;
  }
}

.dino-runner {
  position: absolute;
  bottom: -300px;
  left: 10%;
  animation: runAcross 10s linear infinite;
}
@keyframes runAcross {
  0% { left: -300px; }
  100% { left: 100%; }
}

</style>
<div class="container">
     <h1 class="text-center fw-bold">{{ __('Login') }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-3">
              <h3 class="text-center fw-bold">{{ __('Login') }}</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mt-3 mx-2">

                           
                            <div class="col-4 input-group mb-3">
                                <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

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
                                <button type="submit" class="btn btn-danger btn-lg fw-bold rounded-pill w-100">
                                    {{ __('Login') }}
                                </button>

                            
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="register">
                                        {{ __('Create Your Account') }}
                                    </a>
                                @endif


                                <div class="dino-runner">
  <img src="{{ asset('images/santa.gif') }}" alt="Running Dino">
</div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@for ($i = 0; $i < 30; $i++)
  <div class="snowflake" style="
    left: {{ rand(0, 100) }}vw;
    animation-duration: {{ rand(10, 30) }}s;
    font-size: {{ rand(10, 20) }}px;
  ">
    ❄
  </div>
@endfor
@endsection
