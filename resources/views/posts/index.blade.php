@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-4">
    <div class="row">
        @forelse ($all_posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    {{-- Post Image --}}
                    @if($post->image)
                        <img src="{{ asset('storage/images/' . $post->image) }}" class="card-img-top" alt="Post image">
                    @else
                        <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="Placeholder">
                    @endif

                    <div class="card-body d-flex flex-column">
                        {{-- Title --}}
                        <a href="#" class="text-decoration-none">
                            <h5 class="card-title">{{ $post->title }}</h5>
                        </a>

                        {{-- Cost --}}
                        <h6 class="text-success mb-2">
                            <i class="fa-solid fa-dollar-sign"></i> {{ $post->cost }}
                        </h6>

                        {{-- Author --}}
                        <p class="text-muted mb-2">
                            <i class="fa-solid fa-user"></i> {{ $post->user->name }}
                        </p>

                        {{-- Body --}}
                        <p class="card-text flex-grow-1">{{ Str::limit($post->body, 100) }}</p>

                        {{-- Buttons --}}
                        @if (Auth::user()->id == $post->user_id)
                            <div class="mt-3 text-end">
                                <a href="#" class="btn btn-outline-primary btn-sm me-2">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="mt-3 text-end">
                                <a href="#" class="btn btn-success btn-sm">
                                    <i class="fa-solid fa-cart-shopping"></i> Buy
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center" style="margin-top: 100px;">
                <h2 class="text-secondary">No sales yet</h2>
                <a href="#" class="btn btn-primary mt-3">Create New Sale</a>
            </div>
        @endforelse
    </div>
</div>
@endsection
