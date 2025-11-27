@extends('layouts.app')
 
@section('title', '$user->name')
 
@section('content')
  <div class="container-fluid">
    <div class="row mt-2 mb-5">

      <!-- ====================
      left:Profile （fixed)
      ====================-->
      <div class="col-md-3 border-end p-4" style="height: 100vh; position: static; top:0;">
        <div class="text-center">

          <!-- icon -->
          @if ($user->avatar)
            <img src="{{ asset('storage/avatars/' .$user->avatar) }}" alt="{{ $user->avatar }}" class="rounded-circle img-thumbnail w-100 mb-3">
          @else
            <i class="fa-light fa-face-smile"></i>
          @endif

          <!-- User Name -->
          <h2 class="display-6">{{ $user->name }}</h2>

          <!-- Biography -->
          @if(!empty($user->bio))
            <p class="text-muted">{{ $user->bio }}</p>
          @endif

          <!-- Edit buttun -->
          <a href="edit" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i>Edit Profile</a>

        </div>
      </div>

      <!-- ====================
      rigth:Post (scroll)
      ==================== -->
      <div class="col-md-9 p-4" style="height: 100vh; overflow-y:auto;">

        <!-- Post -->
       @if($post->image)
       <img src="#" alt="{{ $post->image }}" class="img-fluid rounded mb-4" style="max-height: 400px; object-fit:cover; width: 100%;">
       @endif

       <!-- Edit Delete button-->
        @if(Auth::id() === $post->user_id)
        <div class="d-flex gap-2 mt-3">
          <a href="posts.edit" class="btn btn-warning btn-sm">Edit</a>

          <form action="#" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Delete</button>
          </form>
        </div>
      </div>
     
    </div>
  </div>
@endsection
 