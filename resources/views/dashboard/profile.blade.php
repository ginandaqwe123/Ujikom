@extends('layouts.main')

@section('home')

@include('partials.nav')


<div class="container mt-5">
  @if (session()->has('bagus'))
              
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              {{ session('bagus') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('error'))
              
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
    <div class="row">
        <div class="col-md-8">
            <h2>{{ auth()->user()->nama_lengkap }}</h2>
        </div>
    </div>
    <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active"  id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts-tab-pane" type="button" role="tab" aria-controls="posts-tab-pane" aria-selected="true">Posts</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="posts-tab-pane" role="tabpanel" aria-labelledby="posts-tab" tabindex="0">
          <div>
            <div class="container">
                <div class="row">
                  @forelse ($posts as $post)
                  <div class="col-sm-4">
                    <div class="card my-3 " style="width: 18rem;">
                      <i class="bi bi-three-dots-vertical ms-auto mt-1" data-bs-toggle="dropdown"></i>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile.edit', $post->id)  }}"><i class="bi bi-pencil-square"> Edit</i></a></li>
                        <li>
                          <a class="dropdown-item" href="{{ url('profile/' . $post->id. '/delete') }}" onclick="return confirm('Are You Sure?')"> <i class="bi bi-x-octagon"></i> Delete</a> 
                        </li>
                      </ul>
                      
                      <div class="card-body">
                        <div class="btn-center">
                          <a href="/dashboard/{{ $post->id }}/detail">
                          <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid" alt="...">
                          </a> 
                          <h5 class="card-text mt-3">{{ $post->JudulFoto }}</h5>  
                          <p><small class="text-muted card-text">{{ $post->DeskripsiFoto }}</small></p> 
                          <a href="{{ route('foto.like', $post->id)  }}" class="btn btn-light fs-4 item-anchor">
                          <i class="{{ $post->userLiked() ? 'bi bi-heart-fill text-danger' : 'bi bi-heart' }}"></i>
                          <small style="font-size: 0.60em;"> {{ $post->likes->count() }}</small>
                          
                          <a href="{{ url('dashboard/' . $post->id . '/detail') }}"class="btn btn-light fs-4 ">
                            <i class="bi bi-chat-dots"></i>
                            <small style="font-size:0.60em;"> {{ $post->komentarfoto()->count() }}</small>
                          </a>
                        </div>  
                      </div>
                    </div>
                  </div>
                  @empty
                  <div class="alert alert-warning mt-3">
                    Anda Belum Memiliki Postingan
                  </div>
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <hr>
</div>  

<footer class="py-5 bg-black">
  <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Gallery Photo 2024 By : Ginanda Herdiansyah</p></div>
</footer>

@endsection

