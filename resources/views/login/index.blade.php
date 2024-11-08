@extends('layouts.main')

@section('home')

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed">
  <div class="container px-5">
      <a class="navbar-brand" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav ms-auto">
                  @auth

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         {{ auth()->user()->username }}
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile">My Profile</a></li>
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
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="container mt-3">

          @if (session()->has('success'))
            
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if (session()->has('ErrorLogin'))
            
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('ErrorLogin') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="{{ route('login.authenticate') }}" method="POST">
                  @csrf
                  <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid  
                    @enderror" id="username" placeholder="username" autofocus required value="{{ old('username') }}">
                    <label for="Username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="Password">Password</label>
                  </div>
                  <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
    </div>
</div>

@endsection