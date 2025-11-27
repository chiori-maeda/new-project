@extends('layouts.app')
 
@section('title', 'Edit Profile')
 
@section('content')
<form action="{{ 'profile.update' }}" method="post" enctype="multipart/form-data">
  @esrf
  @method('PATCH')

  <!-- Avatar -->
  <div class="row mt-2 mb-3">
    <div class="col-4">
      @if($user->avatar)
      <img src="{{ assert('strage/avatars/' .$user->avatar) }}" alt="{{ $user->avatar }}" class="img-thumbnail w-100">
      @else
      <i class="fa-thin fa-user-secret" fa-10x d-blok text-center></i>
      @endif

      <input type="file" name="avatar" class="form-control mt-1" aria-activedescendant="avatar-info">
      <div class="form-text" id="avatar-info">
        Acceptable formats are jpeg,jpg,png,gif,only. <br>
        Maximum file size is 1048kb.
      </div>

      {{-- Error --}}
      @error('avatar')
      <div class="text-danger small">{{ $message }}</div>
     @enderror
    </div>
  </div>

  <!-- Name -->
  <div class="mb-3">
    <label for="name" class="form-lavel text-secondary">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name,$user->name') }}" autofocus>

    {{-- Error --}}
   @error('name')
   <div class="text-danger small">{{ $message }}</div>     @enderror
  </div>

  <!-- Email -->
  <div class="mb-3">
    <label for="email" class="form-label text-secondary">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email',$user->email) }}">

    {{-- Error --}}
    @error('email')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-warning px-5">Save</button>

</form>
    
@endsection
 