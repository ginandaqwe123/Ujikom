@use ('Illuminate\Support\Facades\Auth')
@use ('App\Models\User')


<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed">
    <div class="container px-5">
        <a class="navbar-brand" href="/dashboard">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

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
