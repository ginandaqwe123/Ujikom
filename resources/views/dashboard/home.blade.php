@extends('layouts.main')

@section('home')

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed">
  <div class="container px-5">
      <a class="navbar-brand" href="/dashboard">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" id="search" name="search" autocomplete="off" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

          <ul class="navbar-nav ms-auto">
                  @auth

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         {{ auth()->user()->nama_lengkap }}
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile">My Profile</a></li>
                        {{-- <li><a class="dropdown-item text-muted"></a>{{ $user->is_admin ? 'Admin' : 'User' }}</li> --}}
                        <li>
                          <form action="{{ route('logout.user') }}" method="POST">
                            @csrf
                          <button class="dropdown-item" type="submit">Logout <i class="bi bi-box-arrow-right"> </i></button>
                        </form>
                        </li>
                      </ul>
                    </li>

                      @else
                  <li class="nav-item">
                      <a class="nav-link" href="/login">
                          <i class="bi bi-box-arrow-in-right">
                           </i> Login</a>
                  </li>
                  @endauth
              </ul>
              <ul class="navbar-nav ml-auto">
                <!-- Link Admin hanya ditampilkan jika user adalah admin -->
                @if(Auth::check() && Auth::user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">Halaman Admin</a>
                    </li>
                @endif
            </ul>
          
      </div>
  </div>
</nav>
<body>

  <header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container px-5">
            <h2 class="masthead-heading mb-0">Welcome To Gallery Photo </h2>
            @if (Auth::check())

            <a href="#myModal" data-bs-toggle="modal" class="btn btn-danger btn-xl rounded-pill mt-5"><i class="fa fa-upload"></i> Upload Image</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-danger btn-xl rounded-pill mt-5"><i class="fa fa-upload"></i> Upload Image</a>
            @endif
        </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>


  <div class="container">
    @if (session()->has('berhasil'))
            
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          
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

  </div>
    
      
    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header text-center text-dark">
              <h4 class="modal-title">Post Image</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <img class="img-preview img-fluid mb-3 col-sm-5">
                    <div class="form-group">
                        <input type="file" id="image" name="image" class="form-control @error('image')
                    is-invalid @enderror" value="{{ old('image') }}" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                    @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="JudulFoto" class="form-control mt-3 @error('JudulFoto')
                    is-invalid @enderror" placeholder="Title Photo" autofocus value="{{ old('JudulFoto') }}">
                    @error('JudulFoto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                    @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="DeskripsiFoto" class="form-control my-3 @error('DeskripsiFoto')
                    is-invalid @enderror" placeholder="Description" autofocus value="{{ old('DeskripsiFoto') }}"></textarea>
                    @error('DeskripsiFoto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                    @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-info" type="submit">Save</button>
                      </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        @forelse ($posts as $post)
        <div class="col-sm-4">
          <div class="card my-3 " style="width: 18rem;">
           
            
            <div class="card-body">
              <a href="{{ url('dashboard/' . $post->id . '/detail') }}">
              <img src="{{ ('storage/' . $post->image) }}" class="card-img-top" alt="...">
              </a>
              <h5 class="card-text mt-3">{{ $post->JudulFoto }}</h5>  
              <p><small class="text-muted card-text">{{ $post->DeskripsiFoto }}</small></p> 

              @if (Auth::check())
              <div class="btn-center">
                <a href="{{ route('foto.like', $post->id)  }}" class="btn btn-light fs-5 item-anchor">
                <i class="{{ $post->userLiked() ? 'bi bi-heart-fill text-danger' : 'bi bi-heart' }}"></i>
                <small style="font-size: 0.60em;"> {{ $post->likes->count() }}</small>
                </a>
                <a href="{{ url('dashboard/' . $post->id . '/detail') }}"class="btn btn-light fs-5 ">
                <i class="bi bi-chat-dots"></i>
                <small style="font-size:0.60em;"> {{ $post->komentarfoto()->count() }}</small>
                </a>
              </div>
              @else
              <a href="{{ route('login') }}" class="btn btn-light">
                <i class="bi bi-heart"></i>
                <small style="font-size:0.60em;"> {{ $post->komentarfoto()->count() }}</small>
              </a>
              <a href="{{ route('login') }}" class="btn btn-light">
                <i class="bi bi-chat-dots"></i> 
                <small style="font-size: 0.60em;"> {{ $post->likes->count() }}</small>
              </a>
              @endif
            </div>
          </div>
        </div>
        @empty
        <div class="alert alert-warning mt-3">
          No Photos
        </div>
        @endforelse
      </div>
    </div>
    @include('partials.foot')
</body>



<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

  $(document).on('click', '.like-btn', function() {
            var foto_id = $(this).data('foto_id');
            var button = $(this);

            $.ajax({
                url: '/foto/' + foto_id  + '/like',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.liked) {
                        button.find('.like-text').text('Unlike');
                    } else {
                        button.find('.like-text').text('Like');
                    }
                    button.siblings('.like-count').text(response.like_count + ' likes');
                }
            });
        });
</script>
@endsection
    
