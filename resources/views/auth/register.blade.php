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

.background-layer {
  background-image: url('{{ asset('images/background.jpg') }}');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  min-height: 100vh;
  padding: 60px 0;
}

.card {
  background-color: rgba(255, 255, 255, 0.85);
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  backdrop-filter: blur(5px);
}

.card-header {
  font-size: 1.5rem;
  font-weight: bold;
  background-color: transparent;
  border-bottom: none;
  text-align: center;
}

.btn-primary {
  background-color: #e63946;
  border: none;
  padding: 10px 20px;
  font-weight: bold;
  border-radius: 25px;
  transition: background-color 0.3s ease;
}
.btn-primary:hover {
  background-color: #d62828;
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
</style>

<div class="background-layer">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
            </form>
          </div>
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
