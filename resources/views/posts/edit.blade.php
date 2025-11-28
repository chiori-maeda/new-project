@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<style>
    body {
  margin: 0;
  padding: 0;
  background-color: #333;
  font-family: 'Segoe UI', sans-serif;
  color: #333;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

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
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white text-center">
                    <h3>Edit Post</h3>
                </div>
                <div class="card-body bg-light">

                    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label text-secondary">Title</label>
                            <input type="text" name="title" id="title" 
                                   class="form-control" 
                                   placeholder="Enter title here"
                                   value="{{ old('title', $post->title) }}" autofocus>
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label text-secondary">Image</label>
                            @if($post->image)
                                <img src="{{ asset('storage/images/'. $post->image) }}" 
                                     alt="{{ $post->image }}" 
                                     class="img-fluid rounded shadow-sm mb-3"
                                     style="max-height:300px; object-fit:cover;">
                            @endif
                            <input type="file" name="image" id="image" class="form-control mt-1" aria-describedby="image-info">
                            <div class="form-text" id="image-info">
                                Acceptable formats: jpeg, jpg, png, gif. <br>
                                Max file size: 1048kB
                            </div>
                            @error('image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Body -->
                        <div class="mb-3">
                            <label for="body" class="form-label text-secondary">Product Description</label>
                            <textarea name="body" id="body" rows="5" 
                                      class="form-control" 
                                      placeholder="Write product details...">{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Save Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning px-5">
                                <i class="fa-solid fa-save"></i> Save
                            </button>
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
