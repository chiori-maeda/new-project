@extends('layouts.app')

@section('title', 'Home')

@section('content')
@forelse ($all_posts as $post)
<div class="mt-2 border border-2 rounded p-4">
    <a href="#">
        <h2 class="h4"></h2>{{ $post->title }}</h2>
    </a>
    <h3 class="h6 text-secondary">{{ $post->user->name }}</h4>
        <p>{{ $post->body }}</p>

        @if (Auth::user()->id==$post->user_id)
        <div class="mt-2 text-end">
            <a href="#"><i class="fa-solid fa-pen">Edit</i></a>


            <form action="#" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn_danger">Delete</button>
            </form>

        </div>
        @endif

</div>
@empty
<div class="text-center" style="margin-top: 100px;">
    <h2 class="text-secondary">No sales yet</h2>

    <a href="#" class="text-decoration-none">Create New sales</a>
</div>
@endforelse

@endsection