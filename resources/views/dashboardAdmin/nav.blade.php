<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed">
    <div class="container px-5">
        <a class="navbar-brand" href="/admin">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav">
            <li class="navbar-brand">
              <a class="navbar-brand" href="/admin/posts">Posts</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </li>
          
            <li class="navbar-brand">
              <a class="navbar-brand" href="/admin/users">Users</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </li>
          </ul>

            <ul class="navbar-nav ms-auto">
                    @auth

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu">
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
            
        </div>
    </div>
</nav>