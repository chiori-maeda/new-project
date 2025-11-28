@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container-fluid">
    <div class="row mt-2 mb-5">

        <!-- ====================
          left:Profile （fixed)
          ====================-->
        <div class="col-md-3 border-end p-4 bg-light" style="height: 100vh; position: static; top:0;">
            <div class="text-center">

                <!-- Avatar -->
                @if ($user->avatar)
                    <img src="{{ asset('storage/avatars/' . $user->avatar) }}" 
                         alt="{{ $user->avatar }}"
                         class="rounded-circle img-thumbnail mb-3"
                         style="width:150px; height:150px; object-fit:cover;">
                @else
                    <i class="fa-solid fa-user-circle fa-5x text-secondary mb-3"></i>
                @endif

                <!-- User Name -->
                <h2 class="h4">{{ $user->name }}</h2>

                <!-- Email -->
                <p class="text-muted mb-1">
                    <i class="fa-solid fa-envelope"></i> {{ $user->email }}
                </p>

                <!-- Joined Date -->
                <p class="text-muted">
                    <i class="fa-solid fa-calendar"></i> Joined {{ $user->created_at->format('Y-m-d') }}
                </p>

                <!-- Edit profile button -->
                @if (Auth::id() === $user->id)
                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-pencil"></i> Edit Profile
                    </a>
                @endif
            </div>
        </div>

        <!-- ====================
          right:Posts (scroll)
          ==================== -->
        <div class="col-md-9 p-4" style="height: 100vh; overflow-y:auto;">
            <h4 class="mb-4">Posts by {{ $user->name }}</h4>

            @forelse ($user->posts as $post)
                <div class="card mb-4 shadow-sm">
                    @if ($post->image)
                        <img src="{{ asset('storage/images/' . $post->image) }}" 
                             alt="Post image" 
                             class="card-img-top"
                             style="max-height: 400px; object-fit:cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->body }}</p>

                        <!-- Edit/Delete buttons -->
                        @if (Auth::id() === $post->user_id)
                            <div class="d-flex gap-2">
                                <a href="{{ route('profile.edit', $post->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                                <form action="#" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-muted">No posts yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection

