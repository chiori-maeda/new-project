@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
<div class="mt-4 mb-5">
    <div class="card shadow-sm border-0 rounded">
        <div class="card-body">
            <h2 class="h4 mb-2">{{ $post->title }}</h2>
            <h6 class="text-secondary mb-3">{{ $post->user->name }}</h6>
            <p class="fw-light">{{ $post->body }}</p>

            @if($post->image)
                <img src="{{ asset('storage/images/' . $post->image) }}" 
                     alt="image" 
                     class="w-100 shadow rounded mt-3">
            @endif
        </div>
    </div>
</div>

<!-- コメント投稿フォーム -->
<div class="card shadow-sm border-0 rounded mb-4">
    <div class="card-body">
        <form action="{{ route('comment.store',$post->id) }}" method="post">
            @csrf
            <div class="input-group">
                <input type="text" name="comment" class="form-control" placeholder="コメントを入力..." value="{{ old('comment') }}">
                <button class="btn btn-outline-secondary">Post</button>
            </div>
            @error('comment')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </form>
    </div>
</div>

<!-- コメント一覧 -->
@if($post->comments->count())
    <div class="card shadow-sm border-0 rounded">
        <div class="card-body">
            <h5 class="mb-3">comments</h5>
            @foreach($post->comments as $comment)
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <span class="fw-bold">{{ $comment->user->name }}</span>
                        <span class="small text-muted ms-2">{{ $comment->created_at->format('Y/m/d H:i') }}</span>
                        <p class="mb-0">{{ $comment->body }}</p>
                    </div>
                    @if($comment->user_id === Auth::id())
                        <form action="{{ route('comment.destroy',$comment->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
@endsection

