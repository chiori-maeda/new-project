@extends('layouts.app')

@section('title', 'Create Product')

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

/* カード風フォーム */
.form-wrapper {
  max-width: 700px;
  margin: 60px auto;
  background-color: rgba(255, 255, 255, 0.9);
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  backdrop-filter: blur(5px);
}
</style>

<div class="form-wrapper">
  <h2 class="text-center mb-4 text-danger">Title</h2>
  <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- 商品画像 -->
    <div class="mb-3">
      <label for="image" class="form-label text-secondary">Product Picture</label>
      <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
      <div class="form-text" id="image-info">
        Acceptable formats are jpeg, jpg, png, gif only. Maximum file size is 1048kB
      </div>
      @error('image')
        <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <!-- 商品名 -->
    <div class="mb-3">
      <label for="title" class="form-label text-secondary">Product Name</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="write title..." value="{{ old('title') }}" autofocus>
      @error('title')
        <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <!-- 商品説明 -->
    <div class="mb-3">
      <label for="body" class="form-label text-secondary">Product Introduce</label>
      <textarea name="body" id="body" rows="5" class="form-control" placeholder="product discription...">{{ old('body') }}</textarea>
      @error('body')
        <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <!-- 投稿ボタン -->
    <div class="text-center">
      <button type="submit" class="btn btn-danger btn-lg px-5">Post New Product</button>
    </div>
  </form>
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
