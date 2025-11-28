@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<style>
/* 雪アニメーション */
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
<div class="snow-container bg-dark text-light py-5" style="min-height:100vh; position:relative; overflow:hidden;">
    <div class="container">
        <div class="card shadow-lg p-4 mx-auto" style="max-width:600px; background-color:rgba(255,255,255,0.9);">
            <h2 class="mb-4 text-center text-dark">Edit Profile</h2>

            <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Avatar -->
                <div class="mb-3 text-center">
                    @if($user->avatar)
                        <img src="{{ asset('storage/avatars/' .$user->avatar) }}" 
                             alt="{{ $user->avatar }}" 
                             class="rounded-circle img-thumbnail mb-3" 
                             style="width:120px; height:120px; object-fit:cover;">
                    @else
                        <i class="fa-solid fa-user-circle fa-5x text-secondary mb-3"></i>
                    @endif

                    <input type="file" name="avatar" class="form-control">
                    <div class="form-text">
                        Acceptable formats: jpeg, jpg, png, gif. Max size: 1048kb.
                    </div>
                    @error('avatar')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label text-dark">Name</label>
                    <input type="text" name="name" id="name" class="form-control" 
                           value="{{ old('name', $user->name) }}" autofocus>
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email</label>
                    <input type="email" name="email" id="email" class="form-control" 
                           value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning px-5">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Snowflakes -->
    @for ($i = 0; $i < 30; $i++)
  <div class="snowflake" style="
    left: {{ rand(0, 100) }}vw;
    animation-duration: {{ rand(10, 30) }}s;
    font-size: {{ rand(10, 20) }}px;
  ">
    ❄
  </div>
@endfor
</div>
@endsection

 