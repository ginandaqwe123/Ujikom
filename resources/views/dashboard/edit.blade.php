@extends('layouts.main')

@section('home')
@include('partials.nav')

<div class="container mt-3">
    <h3>Edit Post</h3>
    <form action="{{ route('image.update', $post->id) }}" method="POST">
        @method('PUT')
        @csrf
        <img src="{{ asset('storage/' . $post->image) }}" class="rounded mx-auto d-block" height="300" alt="">
        <div class="form-group">
            <input type="text" name="JudulFoto" class="form-control mt-3 @error('JudulFoto')
        is-invalid @enderror" placeholder="Title Photo" autofocus value="{{ old('JudulFoto', $post->JudulFoto) }}">
        @error('JudulFoto')
        <div class="invalid-feedback">
            {{ $message }}
        </div>                        
        @enderror
        </div>
        <div class="form-group">
            <textarea name="DeskripsiFoto" class="form-control my-3 @error('DeskripsiFoto')
        is-invalid @enderror" placeholder="Description" autofocus value="{{ old('DeskripsiFoto') }}">{{ $post->DeskripsiFoto }}</textarea>
        @error('DeskripsiFoto')
        <div class="invalid-feedback">
            {{ $message }}
        </div>                          
        @enderror
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-info" type="submit">Update</button>
          </div>
    </form>
</div>
    
@endsection