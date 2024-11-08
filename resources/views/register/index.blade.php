@extends('layouts.main')

@section('home')

@include('partials.nav')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="container mt-3">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                  <div class="form-floating">
                    <input type="text" name="nama_lengkap" class="form-control rounded-top @error('nama_lengkap')
                    is-invalid @enderror" id="nama_lengkap" placeholder="Name" autofocus required value="{{ old('nama_lengkap') }}">
                    <label for="nama_lengkap">Full Name</label>
                    @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email')
                    is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="text" name="alamat" class="form-control @error('alamat')
                    is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required value="{{ old('alamat') }}">
                    <label for="floatingInput">Address</label>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username')
                    is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom @error('password')
                    is-invalid @enderror" id="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                    @enderror
                  </div>
                  <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
            </main>
    </div>
</div>

@endsection