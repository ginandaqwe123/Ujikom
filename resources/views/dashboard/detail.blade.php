@extends('layouts.main')

@section('home')

@include('partials.nav')

<div class="container mt-3">
    @if (session()->has('bagus'))
            
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('bagus') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

        <img src="{{ asset('storage/' . $post->image) }}" class="rounded mx-auto d-block" height="400">
            <h5 class="card-text mt-3">{{ $post->JudulFoto }}</h5>  
            <p><small class="text-muted card-text">{{ $post->DeskripsiFoto }}</small></p> 
            <p>
                <small>
                    Posted by: {{ $post->user ? $post->user->nama_lengkap : 'Unknown' }}
                </small>
            </p>
              <small class="text-muted">
                Uploaded on: {{ date('F j, Y', strtotime($post->created_at)) }}
                </small>  
                
              <hr>

              @foreach ($comments as $komen)
                  <div class="comment d-flex justify-content-between align-item-center mb-3">
                    <div>
                        <strong>{{ $komen->user->nama_lengkap }} : </strong> {{ $komen->isiKomen }}
                        <br>
                     </div>
                    <form action="{{ route('komentar.destroy', $komen->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link btn-sm p-0" onclick="return confirm('You Sure?')" title="Hapus Komentar">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                  </div>
              @endforeach
            <form action="{{ route('foto.komen', $post->id) }}" method="POST">
              @csrf
              <div class="mb-3 d-flex">
                <input type="text" name="isiKomen" class="form-control me-2 @error('isiKomen')
                    is-invalid @enderror" id="komentar" placeholder="Add a comment...">
                    @error('isiKomen')
                    <div class="invalid-feedback">
                     {{ $message }}
                      </div>                          
                     @enderror
                <button type="submit" class="btn btn-primary">Comment</button>
            </div>
            </form>
    </div>


@include('partials.foot')
@endsection